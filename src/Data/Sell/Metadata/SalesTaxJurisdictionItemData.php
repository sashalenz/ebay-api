<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Metadata;

use Spatie\LaravelData\Data;

/**
 * Sales Tax Jurisdiction Item Data
 *
 * Individual sales tax jurisdiction.
 */
class SalesTaxJurisdictionItemData extends Data
{
    public function __construct(
        public ?string $salesTaxJurisdictionId = null,
        public ?string $salesTaxJurisdictionName = null,
    ) {}
}
