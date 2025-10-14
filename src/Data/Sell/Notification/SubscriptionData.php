<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Notification;

use Spatie\LaravelData\Data;

/**
 * Subscription Data
 *
 * Notification topic subscription information.
 */
class SubscriptionData extends Data
{
    public function __construct(
        public ?string $subscriptionId = null,
        public ?string $topicId = null,
        public ?string $destinationId = null,
        public ?string $status = null,
        public ?array $filters = null,
    ) {}
}
