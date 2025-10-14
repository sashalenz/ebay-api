<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Fee Summary Data
 *
 * Summary of all fees for an offer.
 */
class FeeSummaryData extends Data
{
    public function __construct(
        #[DataCollectionOf(FeeData::class)]
        public ?DataCollection $fees = null,
        public ?string $marketplaceId = null,
        public ?array $warnings = null,
    ) {}
}
