<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Analytics;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Traffic Report Data
 *
 * Contains traffic report information for listings.
 */
class TrafficReportData extends Data
{
    public function __construct(
        public ?DimensionData $dimension,
        public ?string $endDate,
        public ?string $lastUpdatedDate,
        #[DataCollectionOf(RecordData::class)]
        public ?DataCollection $records,
        public ?string $startDate,
    ) {}
}
