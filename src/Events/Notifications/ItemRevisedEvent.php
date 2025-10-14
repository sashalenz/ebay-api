<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Events\Notifications;

use Sashalenz\EbayApi\Events\EbayNotificationReceived;
use Sashalenz\EbayApi\Models\EbayNotification;

/**
 * Item Revised Event
 *
 * Fired when an item listing is revised on eBay.
 */
class ItemRevisedEvent extends EbayNotificationReceived
{
    public ?string $itemId;

    public ?string $sku;

    public ?string $title;

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
    }
}
