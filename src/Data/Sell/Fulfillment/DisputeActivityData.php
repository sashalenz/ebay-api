<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Fulfillment;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Dispute Activity Data
 *
 * Activity log for a payment dispute.
 */
class DisputeActivityData extends Data
{
    public function __construct(
        #[DataCollectionOf(ActivityData::class)]
        public ?DataCollection $activity = null,
    ) {}
}
