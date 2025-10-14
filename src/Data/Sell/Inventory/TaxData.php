<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Tax Data
 *
 * Tax information for an offer.
 */
class TaxData extends Data
{
    public function __construct(
        public ?bool $applyTax = null,
        public ?string $thirdPartyTaxCategory = null,
        public ?string $vatPercentage = null,
    ) {}
}
