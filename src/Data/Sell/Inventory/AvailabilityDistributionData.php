<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Availability Distribution Data
 *
 * Represents availability distribution across merchant locations.
 */
class AvailabilityDistributionData extends Data
{
    public function __construct(
        public ?TimeDurationData $fulfillmentTime = null,
        public ?string $merchantLocationKey = null,
        public ?int $quantity = null,
    ) {}
}
