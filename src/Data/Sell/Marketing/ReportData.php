<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Marketing;

use Spatie\LaravelData\Data;

/**
 * Report Data
 *
 * Ad report data for performance metrics.
 */
class ReportData extends Data
{
    public function __construct(
        public ?string $reportId = null,
        public ?array $reportMetadata = null,
        public ?array $dimensions = null,
        public ?array $metrics = null,
    ) {}
}
