<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Events\Notifications;

use Sashalenz\EbayApi\Events\EbayNotificationReceived;
use Sashalenz\EbayApi\Models\EbayNotification;

/**
 * Order Created Event
 *
 * Fired when a new order is created on eBay.
 */
class OrderCreatedEvent extends EbayNotificationReceived
{
    public ?string $orderId;

    public ?string $orderStatus;

    public ?string $buyerUserId;

    public ?string $total;

    public function __construct(
        EbayNotification $notification,
        string $eventName,
        array $payload,
        array $eventData
    ) {
        parent::__construct($notification, $eventName, $payload);

        $this->orderId = $eventData['order_id'] ?? null;
        $this->orderStatus = $eventData['order_status'] ?? null;
        $this->buyerUserId = $eventData['buyer_user_id'] ?? null;
        $this->total = $eventData['total'] ?? null;
    }
}
