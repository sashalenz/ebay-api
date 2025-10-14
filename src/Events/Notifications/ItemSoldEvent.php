<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Events\Notifications;

use Sashalenz\EbayApi\Events\EbayNotificationReceived;
use Sashalenz\EbayApi\Models\EbayNotification;

/**
 * Item Sold Event
 *
 * Fired when an item is sold on eBay.
 */
class ItemSoldEvent extends EbayNotificationReceived
{
    public ?string $itemId;

    public ?string $transactionId;

    public ?string $buyerUserId;

    public ?int $quantityPurchased;

    public ?string $transactionPrice;

    public function __construct(
        EbayNotification $notification,
        string $eventName,
        array $payload,
        array $eventData
    ) {
        parent::__construct($notification, $eventName, $payload);

        $this->itemId = $eventData['item_id'] ?? null;
        $this->transactionId = $eventData['transaction_id'] ?? null;
        $this->buyerUserId = $eventData['buyer_user_id'] ?? null;
        $this->quantityPurchased = $eventData['quantity_purchased'] ?? null;
        $this->transactionPrice = $eventData['transaction_price'] ?? null;
    }
}
