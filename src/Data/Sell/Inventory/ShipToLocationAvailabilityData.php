<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Ship To Location Availability Data
 *
 * Represents ship-to-home availability.
 */
class ShipToLocationAvailabilityData extends Data
{
    public function __construct(
        public ?FormatAllocationData $allocationByFormat = null,
        #[DataCollectionOf(AvailabilityDistributionData::class)]
        public ?DataCollection $availabilityDistributions = null,
        public ?int $quantity = null,
    ) {}
}
