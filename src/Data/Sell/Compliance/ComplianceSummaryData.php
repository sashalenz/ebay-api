<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Compliance;

use Spatie\LaravelData\Data;

/**
 * Compliance Summary Data
 *
 * Contains summary of violations by compliance type.
 */
class ComplianceSummaryData extends Data
{
    public function __construct(
        public ?string $complianceType,
        public ?int $listingCount,
        public ?string $marketplaceId,
    ) {}
}
