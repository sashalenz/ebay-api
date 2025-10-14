<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Analytics;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Metric Distribution Data
 *
 * Contains metric distribution over time.
 */
class MetricDistributionData extends Data
{
    public function __construct(
        #[DataCollectionOf(DistributionData::class)]
        public ?DataCollection $distributions,
        public ?string $metricKey,
    ) {}
}
