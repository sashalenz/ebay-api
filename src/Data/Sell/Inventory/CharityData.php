<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Charity Data
 *
 * Information about a charitable organization.
 */
class CharityData extends Data
{
    public function __construct(
        public ?string $charityId = null,
        public ?string $donationPercentage = null,
    ) {}
}
