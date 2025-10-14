<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Analytics;

use Spatie\LaravelData\Data;

/**
 * Benchmark Data
 *
 * Contains benchmark comparison data for a metric.
 */
class BenchmarkData extends Data
{
    public function __construct(
        public ?string $basis,
        public ?string $value,
        public ?MetadataData $metadata,
    ) {}
}
