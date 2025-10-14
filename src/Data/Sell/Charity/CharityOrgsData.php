<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Charity;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Charity Organizations Data
 *
 * Collection of charitable organizations.
 */
class CharityOrgsData extends Data
{
    public function __construct(
        #[DataCollectionOf(CharityOrgData::class)]
        public ?DataCollection $charityOrgs = null,
        public ?int $total = null,
    ) {}
}
