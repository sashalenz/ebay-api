<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Identity;

use Spatie\LaravelData\Data;

/**
 * Address Data
 *
 * Contains address information.
 */
class AddressData extends Data
{
    public function __construct(
        public ?string $addressLine1,
        public ?string $addressLine2,
        public ?string $city,
        public ?string $stateOrProvince,
        public ?string $postalCode,
        public ?string $country,
    ) {}
}
