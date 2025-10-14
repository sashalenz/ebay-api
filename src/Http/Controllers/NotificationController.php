<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Sashalenz\EbayApi\Exceptions\InvalidNotificationSignatureException;
use Sashalenz\EbayApi\Jobs\ProcessEbayNotificationJob;
use Sashalenz\EbayApi\Models\EbayNotification;
use Sashalenz\EbayApi\Services\NotificationParser;

/**
 * Notification Controller
 *
 * Receives eBay Platform Notifications (SOAP webhooks).
 */
class NotificationController
{
    public function __invoke(Request $request, NotificationParser $parser): Response
    {
        try {
            // Get raw SOAP XML from request body
            $xml = $request->getContent();

            if (empty($xml)) {
                Log::warning('Empty notification received');

                return response('OK', 200);
            }

            // Parse SOAP message
            $data = $parser->parseSOAP($xml);

            // Validate signature if enabled
            if (config('ebay-api.notifications.validate_signature')) {
                try {
                    $parser->validateSignature(
                        $data['notification_signature'],
                        $data['timestamp']
                    );

                    $parser->validateTimestamp(
                        $data['timestamp'],
                        config('ebay-api.notifications.signature_tolerance_minutes', 10)
                    );
                } catch (InvalidNotificationSignatureException $e) {
                    Log::error('Invalid notification signature', [
                        'error' => $e->getMessage(),
                        'event_name' => $data['event_name'] ?? 'unknown',
                    ]);

                    // Still return 200 to prevent eBay retries
                    return response('OK', 200);
                }
            }

            // Store in database if enabled
            if (config('ebay-api.notifications.store_in_database', true)) {
                $notification = EbayNotification::create($data);

                Log::info('eBay notification received', [
                    'id' => $notification->id,
                    'event_name' => $notification->event_name,
                    'recipient_user_id' => $notification->recipient_user_id,
                ]);

                // Dispatch queue job for async processing
                ProcessEbayNotificationJob::dispatch($notification->id)
                    ->onQueue(config('ebay-api.notifications.queue', 'default'));
            } else {
                // Process immediately without storing
                Log::info('eBay notification received (not stored)', [
                    'event_name' => $data['event_name'],
                    'recipient_user_id' => $data['recipient_user_id'],
                ]);

                // Dispatch event directly
                $eventData = $parser->extractEventData($data['event_name'], $data['payload']);

                $eventType = \Sashalenz\EbayApi\Enums\NotificationEventType::tryFrom($data['event_name']);
                $eventClass = $eventType?->getEventClass();

                if ($eventClass) {
                    // Create temporary model instance for event
                    $tempNotification = new EbayNotification($data);

                    event(new $eventClass(
                        $tempNotification,
                        $data['event_name'],
                        $data['payload'],
                        $eventData
                    ));
                }
            }

            // REQUIRED: Return HTTP 200 to eBay
            return response('OK', 200);
        } catch (\Throwable $e) {
            // Log error but still return 200 to prevent eBay retries
            Log::error('Error processing eBay notification', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response('OK', 200);
        }
    }
}
