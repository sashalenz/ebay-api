<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Identity;

use Spatie\LaravelData\Data;

/**
 * Business Account Data
 *
 * Contains business information for business accounts.
 */
class BusinessAccountData extends Data
{
    public function __construct(
        public ?string $name,
        public ?string $email,
        public ?AddressData $address,
        public ?string $doingBusinessAs,
    ) {}
}
