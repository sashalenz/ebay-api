<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Identity;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * User Data
 *
 * Contains authenticated user's account profile information.
 * Available fields depend on OAuth scopes granted.
 */
class UserData extends Data
{
    public function __construct(
        public ?string $username,
        public ?string $userId,
        #[DataCollectionOf(IndividualAccountData::class)]
        public ?DataCollection $individualAccount,
        #[DataCollectionOf(BusinessAccountData::class)]
        public ?DataCollection $businessAccount,
    ) {}
}
