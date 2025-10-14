<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Events\Notifications;

use Sashalenz\EbayApi\Events\EbayNotificationReceived;
use Sashalenz\EbayApi\Models\EbayNotification;

/**
 * Item Availability Event
 *
 * Fired when item availability changes.
 */
class ItemAvailabilityEvent extends EbayNotificationReceived
{
    public ?string $itemId;

    public ?string $sku;

    public ?int $quantity;

    public function __construct(
        EbayNotification $notification,
        string $eventName,
        array $payload,
        array $eventData
    ) {
        parent::__construct($notification, $eventName, $payload);

        $this->itemId = $eventData['item_id'] ?? null;
        $this->sku = $eventData['sku'] ?? null;
        $this->quantity = $eventData['quantity'] ?? null;
    }
}
