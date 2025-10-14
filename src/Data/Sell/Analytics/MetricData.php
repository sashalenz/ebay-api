<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Analytics;

use Spatie\LaravelData\Data;

/**
 * Metric Data
 *
 * Contains individual metric values and benchmarks.
 */
class MetricData extends Data
{
    public function __construct(
        public ?string $name,
        public ?string $value,
        public ?BenchmarkData $benchmark,
        public ?string $rating,
    ) {}
}
