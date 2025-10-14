<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Notification;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Subscriptions Data
 *
 * Collection of notification subscriptions.
 */
class SubscriptionsData extends Data
{
    public function __construct(
        #[DataCollectionOf(SubscriptionData::class)]
        public ?DataCollection $subscriptions = null,
        public ?int $total = null,
    ) {}
}
