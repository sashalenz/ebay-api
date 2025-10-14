<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Charity;

use Spatie\LaravelData\Data;

/**
 * Location Data
 *
 * Location information for a charitable organization.
 */
class LocationData extends Data
{
    public function __construct(
        public ?string $city = null,
        public ?string $stateOrProvince = null,
        public ?string $country = null,
    ) {}
}
