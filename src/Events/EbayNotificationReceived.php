<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Sashalenz\EbayApi\Models\EbayNotification;

/**
 * eBay Notification Received Event
 *
 * Base event for all eBay Platform Notifications.
 */
class EbayNotificationReceived
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public EbayNotification $notification,
        public string $eventName,
        public array $payload
    ) {}
}
