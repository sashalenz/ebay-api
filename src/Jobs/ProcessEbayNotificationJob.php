<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Sashalenz\EbayApi\Enums\NotificationEventType;
use Sashalenz\EbayApi\Models\EbayNotification;
use Sashalenz\EbayApi\Services\NotificationParser;

/**
 * Process eBay Notification Job
 *
 * Processes eBay Platform Notifications asynchronously.
 */
class ProcessEbayNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    public int $backoff = 60;

    public function __construct(
        public int $notificationId
    ) {}

    public function handle(): void
    {
        $notification = EbayNotification::find($this->notificationId);

        if (! $notification) {
            Log::warning("eBay notification {$this->notificationId} not found");

            return;
        }

        try {
            $notification->markAsProcessing();

            // Get event type
            $eventType = NotificationEventType::tryFrom($notification->event_name);

            if (! $eventType) {
                throw new \RuntimeException("Unknown event type: {$notification->event_name}");
            }

            // Get parser instance
            $parser = app(NotificationParser::class);

            // Extract event-specific data
            $eventData = $parser->extractEventData($notification->event_name, $notification->payload);

            // Get event class
            $eventClass = $eventType->getEventClass();

            if ($eventClass) {
                // Dispatch specific event
                event(new $eventClass(
                    $notification,
                    $notification->event_name,
                    $notification->payload,
                    $eventData
                ));
            } else {
                // Dispatch generic event
                event(new \Sashalenz\EbayApi\Events\EbayNotificationReceived(
                    $notification,
                    $notification->event_name,
                    $notification->payload
                ));
            }

            $notification->markAsCompleted();

            Log::info('eBay notification processed', [
                'id' => $notification->id,
                'event_name' => $notification->event_name,
                'recipient_user_id' => $notification->recipient_user_id,
            ]);
        } catch (\Throwable $e) {
            $notification->markAsFailed($e->getMessage());

            Log::error('Failed to process eBay notification', [
                'id' => $notification->id,
                'event_name' => $notification->event_name,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            throw $e;
        }
    }

    public function failed(\Throwable $exception): void
    {
        $notification = EbayNotification::find($this->notificationId);

        if ($notification) {
            $notification->markAsFailed("Job failed after {$this->tries} attempts: ".$exception->getMessage());
        }

        Log::error('eBay notification job permanently failed', [
            'notification_id' => $this->notificationId,
            'error' => $exception->getMessage(),
        ]);
    }
}
