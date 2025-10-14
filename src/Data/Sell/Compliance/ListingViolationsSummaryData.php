<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Compliance;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Listing Violations Summary Data
 *
 * Contains summary information about listing violations.
 */
class ListingViolationsSummaryData extends Data
{
    public function __construct(
        #[DataCollectionOf(ComplianceSummaryData::class)]
        public ?DataCollection $violationSummaries,
    ) {}
}
