<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Fulfillment;

use Spatie\LaravelData\Data;

/**
 * Activity Data
 *
 * Single activity entry in a payment dispute.
 */
class ActivityData extends Data
{
    public function __construct(
        public ?string $activityDate = null,
        public ?string $activityType = null,
        public ?string $actorType = null,
        public ?string $description = null,
    ) {}
}
