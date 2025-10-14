<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Notification;

use Spatie\LaravelData\Data;

/**
 * Subscription Filter Data
 *
 * Filter for controlling notification delivery.
 */
class SubscriptionFilterData extends Data
{
    public function __construct(
        public ?string $filterId = null,
        public ?string $filterType = null,
        public ?array $criteria = null,
    ) {}
}
