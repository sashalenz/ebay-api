<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Analytics;

use Spatie\LaravelData\Data;

/**
 * Distribution Data
 *
 * Contains individual distribution data point.
 */
class DistributionData extends Data
{
    public function __construct(
        public ?string $percentage,
        public ?string $value,
    ) {}
}
