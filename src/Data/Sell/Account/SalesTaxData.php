<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Account;

use Spatie\LaravelData\Data;

/**
 * Sales Tax Data
 *
 * Sales tax configuration for a jurisdiction.
 */
class SalesTaxData extends Data
{
    public function __construct(
        public ?string $countryCode = null,
        public ?string $salesTaxJurisdictionId = null,
        public ?string $salesTaxPercentage = null,
        public ?bool $shippingAndHandlingTaxed = null,
    ) {}
}
