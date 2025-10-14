<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Analytics;

use Spatie\LaravelData\Data;

/**
 * Dimension Data
 *
 * Contains performance metrics for a specific dimension.
 */
class DimensionData extends Data
{
    public function __construct(
        public ?string $name,
        public ?string $value,
        public ?MetricData $metrics,
    ) {}
}
