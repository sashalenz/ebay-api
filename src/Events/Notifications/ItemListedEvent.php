<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Events\Notifications;

use Sashalenz\EbayApi\Events\EbayNotificationReceived;
use Sashalenz\EbayApi\Models\EbayNotification;

/**
 * Item Listed Event
 *
 * Fired when an item is listed on eBay.
 */
class ItemListedEvent extends EbayNotificationReceived
{
    public ?string $itemId;

    public ?string $sku;

    public ?string $title;

    public ?string $listingType;

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
        $this->listingType = $eventData['listing_type'] ?? null;
    }
}
