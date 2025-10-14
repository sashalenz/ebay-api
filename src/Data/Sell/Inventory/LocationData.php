<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Location Data
 *
 * Physical location information.
 */
class LocationData extends Data
{
    public function __construct(
        public ?AddressData $address = null,
        public ?GeoCoordinatesData $geoCoordinates = null,
        public ?string $locationId = null,
    ) {}
}
