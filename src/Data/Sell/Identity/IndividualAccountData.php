<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Identity;

use Spatie\LaravelData\Data;

/**
 * Individual Account Data
 *
 * Contains personal information for individual accounts.
 */
class IndividualAccountData extends Data
{
    public function __construct(
        public ?string $firstName,
        public ?string $lastName,
        public ?string $email,
        public ?AddressData $address,
    ) {}
}
