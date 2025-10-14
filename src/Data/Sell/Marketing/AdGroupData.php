<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Marketing;

use Spatie\LaravelData\Data;

/**
 * Ad Group Data
 *
 * Ad group for organizing ads in PLA campaigns.
 */
class AdGroupData extends Data
{
    public function __construct(
        public ?string $adGroupId = null,
        public ?string $name = null,
        public ?string $adGroupStatus = null,
        public ?array $defaultBid = null,
    ) {}
}
