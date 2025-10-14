<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Events\Notifications;

use Sashalenz\EbayApi\Events\EbayNotificationReceived;
use Sashalenz\EbayApi\Models\EbayNotification;

/**
 * Item Ended Event
 *
 * Fired when an item listing ends on eBay.
 */
class ItemEndedEvent extends EbayNotificationReceived
{
    public ?string $itemId;

    public ?string $sku;

    public ?string $title;

    public ?int $quantitySold;

    public function __construct(
        EbayNotification $notification,
        string $eventName,
        array $payload,
        array $eventData
    ) {
        parent::__construct($notification, $eventName, $payload);

        $this->itemId = $eventData['item_id'] ?? null;
        $this->sku = $eventData['sku'] ?? null;
        $this->title = $eventData['title'] ?? null;
        $this->quantitySold = $eventData['quantity_sold'] ?? null;
    }
}
