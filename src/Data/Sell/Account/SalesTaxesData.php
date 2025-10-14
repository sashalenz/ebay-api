<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Account;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Sales Taxes Data
 *
 * Collection of sales tax configurations.
 */
class SalesTaxesData extends Data
{
    public function __construct(
        #[DataCollectionOf(SalesTaxData::class)]
        public ?DataCollection $salesTaxes = null,
    ) {}
}
