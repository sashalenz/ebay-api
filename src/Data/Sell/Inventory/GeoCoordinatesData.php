<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Geo Coordinates Data
 *
 * Geographic coordinates for a location.
 */
class GeoCoordinatesData extends Data
{
    public function __construct(
        public ?float $latitude = null,
        public ?float $longitude = null,
    ) {}
}
