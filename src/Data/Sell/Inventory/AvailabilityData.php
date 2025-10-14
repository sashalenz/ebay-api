<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Availability Data
 *
 * Represents item availability (ship-to-home and in-store pickup).
 */
class AvailabilityData extends Data
{
    public function __construct(
        #[DataCollectionOf(PickupAtLocationAvailabilityData::class)]
        public ?DataCollection $pickupAtLocationAvailability = null,
        public ?ShipToLocationAvailabilityData $shipToLocationAvailability = null,
    ) {}
}
