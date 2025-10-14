<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Events\Notifications;

use Sashalenz\EbayApi\Events\EbayNotificationReceived;
use Sashalenz\EbayApi\Models\EbayNotification;

/**
 * Marketplace Account Deletion Event
 *
 * CRITICAL: Fired when a user deletes their eBay account (GDPR compliance).
 * Application must handle this event to comply with data protection regulations.
 */
class MarketplaceAccountDeletionEvent extends EbayNotificationReceived
{
    public ?string $userId;

    public ?string $deletionDate;

    public function __construct(
        EbayNotification $notification,
        string $eventName,
        array $payload,
        array $eventData
    ) {
        parent::__construct($notification, $eventName, $payload);

        $this->userId = $eventData['user_id'] ?? null;
        $this->deletionDate = $eventData['deletion_date'] ?? null;
    }
}
