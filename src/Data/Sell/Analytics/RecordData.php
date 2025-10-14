<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Analytics;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Record Data
 *
 * Contains individual traffic record data.
 */
class RecordData extends Data
{
    public function __construct(
        public ?string $dimensionValue,
        public ?string $listingId,
        #[DataCollectionOf(MetricDistributionData::class)]
        public ?DataCollection $metricDistributions,
    ) {}
}
