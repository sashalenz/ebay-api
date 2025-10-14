<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Analytics;

use Spatie\LaravelData\Data;

/**
 * Customer Service Metric Data
 *
 * Contains data related to a seller's customer service performance metrics.
 */
class CustomerServiceMetricData extends Data
{
    public function __construct(
        public ?DimensionData $dimensionMetrics,
        public ?string $marketplaceId,
        public ?EvaluationCycleData $evaluationCycle,
    ) {}
}
