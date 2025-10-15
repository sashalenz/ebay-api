<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Events\Notifications;

use Sashalenz\EbayApi\Events\EbayNotificationReceived;
use Sashalenz\EbayApi\Models\EbayNotification;

/**
 * Marketplace Account Deletion Notification Event
 *
 * Fired when eBay sends a marketplace account deletion notification (GDPR).
 *
 * IMPORTANT: You MUST delete or anonymize all data associated with this user
 * to comply with GDPR regulations.
 *
 * Event Data:
 * - username: eBay username
 * - userId: eBay user ID
 * - eiasToken: Enterprise Identity and Access Service token
 */
class MarketplaceAccountDeletionNotificationEvent extends EbayNotificationReceived
{
    public string $username;

    public string $userId;

    public ?string $eiasToken;

    public function __construct(
        EbayNotification $notification,
        string $eventName,
        array $rawPayload,
        array $eventData
    ) {
        parent::__construct($notification, $eventName, $rawPayload, $eventData);

        $this->username = $eventData['username'] ?? '';
        $this->userId = $eventData['userId'] ?? '';
        $this->eiasToken = $eventData['eiasToken'] ?? null;
    }

    /**
     * Get username to delete
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Get user ID to delete
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * Get EIAS token (optional)
     */
    public function getEiasToken(): ?string
    {
        return $this->eiasToken;
    }
}
