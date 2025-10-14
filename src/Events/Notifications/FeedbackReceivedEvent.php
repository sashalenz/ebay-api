<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Events\Notifications;

use Sashalenz\EbayApi\Events\EbayNotificationReceived;
use Sashalenz\EbayApi\Models\EbayNotification;

/**
 * Feedback Received Event
 *
 * Fired when feedback is received on eBay.
 */
class FeedbackReceivedEvent extends EbayNotificationReceived
{
    public ?int $feedbackScore;

    public ?string $commentType;

    public ?string $commentText;

    public ?string $itemId;

    public function __construct(
        EbayNotification $notification,
        string $eventName,
        array $payload,
        array $eventData
    ) {
        parent::__construct($notification, $eventName, $payload);

        $this->feedbackScore = $eventData['feedback_score'] ?? null;
        $this->commentType = $eventData['comment_type'] ?? null;
        $this->commentText = $eventData['comment_text'] ?? null;
        $this->itemId = $eventData['item_id'] ?? null;
    }
}
