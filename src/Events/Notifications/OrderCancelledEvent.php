<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Events\Notifications;

use Sashalenz\EbayApi\Events\EbayNotificationReceived;
use Sashalenz\EbayApi\Models\EbayNotification;

/**
 * Order Cancelled Event
 *
 * Fired when an order is cancelled on eBay.
 */
class OrderCancelledEvent extends EbayNotificationReceived
{
    public ?string $orderId;

    public ?string $cancelReason;

    public function __construct(
        EbayNotification $notification,
        string $eventName,
        array $payload,
        array $eventData
    ) {
        parent::__construct($notification, $eventName, $payload);

        $this->orderId = $eventData['order_id'] ?? null;
        $this->cancelReason = $eventData['cancel_reason'] ?? null;
    }
}
