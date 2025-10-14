<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Compliance;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Paged Compliance Violation Collection Data
 *
 * Contains paginated collection of listing violations.
 */
class PagedComplianceViolationCollectionData extends Data
{
    public function __construct(
        public ?string $href,
        public ?int $limit,
        public ?string $next,
        public ?int $offset,
        public ?string $prev,
        public ?int $total,
        #[DataCollectionOf(ComplianceViolationData::class)]
        public ?DataCollection $listingViolations,
    ) {}
}
