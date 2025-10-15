<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Sashalenz\EbayApi\Events\Notifications\MarketplaceAccountDeletionNotificationEvent;
use Sashalenz\EbayApi\Jobs\ProcessMarketplaceAccountDeletionJob;
use Sashalenz\EbayApi\Models\EbayNotification;

/**
 * Marketplace Account Deletion Controller
 *
 * Handles eBay marketplace account deletion notifications (GDPR compliance).
 *
 * @see https://developer.ebay.com/marketplace-account-deletion
 */
class MarketplaceAccountDeletionController
{
    /**
     * Handle incoming marketplace account deletion notifications
     *
     * Supports two types of requests:
     * 1. GET - Verification challenge from eBay
     * 2. POST - Actual deletion notification
     */
    public function __invoke(Request $request): JsonResponse
    {
        // GET request = eBay verification challenge
        if ($request->isMethod('GET')) {
            return $this->handleVerificationChallenge($request);
        }

        // POST request = Actual deletion notification
        if ($request->isMethod('POST')) {
            return $this->handleDeletionNotification($request);
        }

        return response()->json(['error' => 'Method not allowed'], 405);
    }

    /**
     * Handle verification challenge (GET request)
     *
     * eBay sends a challenge token, we must respond with challengeResponse
     * = hash(challenge_code + verification_token + endpoint_url)
     */
    protected function handleVerificationChallenge(Request $request): JsonResponse
    {
        $challengeCode = $request->query('challenge_code');

        if (empty($challengeCode)) {
            Log::warning('Marketplace account deletion challenge missing challenge_code');

            return response()->json(['error' => 'Missing challenge_code'], 400);
        }

        $verificationToken = config('ebay-api.marketplace_account_deletion.verification_token');

        if (empty($verificationToken)) {
            Log::error('Marketplace account deletion verification_token not configured');

            return response()->json(['error' => 'Verification token not configured'], 500);
        }

        // Validate token length (eBay requires 32-80 chars)
        if (strlen($verificationToken) < 32 || strlen($verificationToken) > 80) {
            Log::error('Marketplace account deletion verification_token invalid length', [
                'length' => strlen($verificationToken),
            ]);

            return response()->json(['error' => 'Invalid verification token length'], 500);
        }

        // Build endpoint URL
        $endpointUrl = url()->current();

        // Calculate challengeResponse = hash(challenge_code + verification_token + endpoint_url)
        $challengeResponse = hash('sha256', $challengeCode.$verificationToken.$endpointUrl);

        Log::info('Marketplace account deletion verification challenge successful', [
            'challenge_code' => $challengeCode,
            'endpoint_url' => $endpointUrl,
        ]);

        return response()->json([
            'challengeResponse' => $challengeResponse,
        ]);
    }

    /**
     * Handle deletion notification (POST request)
     *
     * eBay sends account deletion notification with notification_id and metadata
     */
    protected function handleDeletionNotification(Request $request): JsonResponse
    {
        try {
            $payload = $request->all();

            if (empty($payload)) {
                Log::warning('Empty marketplace account deletion notification received');

                return response()->json(['status' => 'accepted'], 200);
            }

            // Expected payload structure:
            // {
            //   "metadata": {
            //     "topic": "MARKETPLACE_ACCOUNT_DELETION",
            //     "schemaVersion": "1.0",
            //     "deprecated": false
            //   },
            //   "notification": {
            //     "notificationId": "...",
            //     "eventDate": "...",
            //     "publishDate": "...",
            //     "publishAttemptCount": 1,
            //     "data": {
            //       "username": "...",
            //       "userId": "...",
            //       "eiasToken": "..."
            //     }
            //   }
            // }

            $notificationId = $payload['notification']['notificationId'] ?? null;
            $username = $payload['notification']['data']['username'] ?? null;
            $userId = $payload['notification']['data']['userId'] ?? null;

            Log::info('Marketplace account deletion notification received', [
                'notification_id' => $notificationId,
                'username' => $username,
                'user_id' => $userId,
            ]);

            // Store in database if enabled
            if (config('ebay-api.marketplace_account_deletion.store_in_database', true)) {
                $notification = EbayNotification::create([
                    'event_name' => 'MARKETPLACE_ACCOUNT_DELETION',
                    'notification_id' => $notificationId,
                    'recipient_user_id' => $userId,
                    'notification_signature' => null,
                    'timestamp' => $payload['notification']['eventDate'] ?? now(),
                    'payload' => $payload,
                    'processed' => false,
                ]);

                // Dispatch queue job for async processing
                ProcessMarketplaceAccountDeletionJob::dispatch($notification->id)
                    ->onQueue(config('ebay-api.marketplace_account_deletion.queue', 'default'));
            } else {
                // Process immediately without storing
                $tempNotification = new EbayNotification([
                    'event_name' => 'MARKETPLACE_ACCOUNT_DELETION',
                    'notification_id' => $notificationId,
                    'recipient_user_id' => $userId,
                    'payload' => $payload,
                ]);

                event(new MarketplaceAccountDeletionNotificationEvent(
                    $tempNotification,
                    'MARKETPLACE_ACCOUNT_DELETION',
                    $payload,
                    [
                        'username' => $username,
                        'userId' => $userId,
                        'eiasToken' => $payload['notification']['data']['eiasToken'] ?? null,
                    ]
                ));
            }

            // REQUIRED: Return HTTP 200 to eBay
            return response()->json(['status' => 'accepted'], 200);
        } catch (\Throwable $e) {
            // Log error but still return 200 to prevent eBay retries
            Log::error('Error processing marketplace account deletion notification', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json(['status' => 'accepted'], 200);
        }
    }
}
