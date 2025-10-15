<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Sashalenz\EbayApi\Events\Notifications\MarketplaceAccountDeletionNotificationEvent;
use Sashalenz\EbayApi\Models\EbayNotification;

/**
 * Process Marketplace Account Deletion Job
 *
 * Handles async processing of marketplace account deletion notifications.
 */
class ProcessMarketplaceAccountDeletionJob implements ShouldQueue
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
            Log::error('Marketplace account deletion notification not found', [
                'notification_id' => $this->notificationId,
            ]);

            return;
        }

        try {
            $payload = $notification->payload;
            $username = $payload['notification']['data']['username'] ?? null;
            $userId = $payload['notification']['data']['userId'] ?? null;
            $eiasToken = $payload['notification']['data']['eiasToken'] ?? null;

            // Dispatch Laravel event
            event(new MarketplaceAccountDeletionNotificationEvent(
                $notification,
                $notification->event_name,
                $payload,
                [
                    'username' => $username,
                    'userId' => $userId,
                    'eiasToken' => $eiasToken,
                ]
            ));

            // Mark as processed
            $notification->update(['processed' => true]);

            Log::info('Marketplace account deletion notification processed', [
                'notification_id' => $notification->id,
                'username' => $username,
                'user_id' => $userId,
            ]);
        } catch (\Throwable $e) {
            Log::error('Failed to process marketplace account deletion notification', [
                'notification_id' => $notification->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            throw $e;
        }
    }
}
