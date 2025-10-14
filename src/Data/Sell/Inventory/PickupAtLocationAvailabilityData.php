<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Sashalenz\EbayApi\Enums\AvailabilityType;
use Spatie\LaravelData\Data;

/**
 * Pickup At Location Availability Data
 *
 * Represents in-store pickup availability.
 */
class PickupAtLocationAvailabilityData extends Data
{
    public function __construct(
        public ?AvailabilityType $availabilityType = null,
        public ?TimeDurationData $fulfillmentTime = null,
        public ?string $merchantLocationKey = null,
        public ?int $quantity = null,
    ) {}
}
