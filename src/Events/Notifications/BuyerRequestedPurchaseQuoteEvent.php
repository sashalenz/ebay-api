<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Events\Notifications;

use Sashalenz\EbayApi\Events\EbayNotificationReceived;
use Sashalenz\EbayApi\Models\EbayNotification;

/**
 * Buyer Requested Purchase Quote Event
 *
 * Fired when a buyer requests a purchase quote.
 */
class BuyerRequestedPurchaseQuoteEvent extends EbayNotificationReceived
{
    public ?string $itemId;

    public ?string $buyerUserId;

    public ?string $quoteId;

    public function __construct(
        EbayNotification $notification,
        string $eventName,
        array $payload,
        array $eventData
    ) {
        parent::__construct($notification, $eventName, $payload);

        $this->itemId = $eventData['item_id'] ?? null;
        $this->buyerUserId = $eventData['buyer_user_id'] ?? null;
        $this->quoteId = $eventData['quote_id'] ?? null;
    }
}
