<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Listing Fees Data
 *
 * Response containing listing fees for offers.
 */
class ListingFeesData extends Data
{
    public function __construct(
        #[DataCollectionOf(FeeSummaryData::class)]
        public ?DataCollection $feeSummaries = null,
    ) {}
}
