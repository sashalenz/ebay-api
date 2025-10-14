<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Address Data
 *
 * Physical address information.
 */
class AddressData extends Data
{
    public function __construct(
        public ?string $addressLine1 = null,
        public ?string $addressLine2 = null,
        public ?string $city = null,
        public ?string $stateOrProvince = null,
        public ?string $postalCode = null,
        public ?string $country = null,
    ) {}
}
