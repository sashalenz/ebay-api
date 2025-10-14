<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Metadata;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Sales Tax Jurisdiction Data
 *
 * Sales tax jurisdiction information.
 */
class SalesTaxJurisdictionData extends Data
{
    public function __construct(
        #[DataCollectionOf(SalesTaxJurisdictionItemData::class)]
        public ?DataCollection $salesTaxJurisdictions = null,
    ) {}
}
