<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Compliance;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Compliance Violation Data
 *
 * Contains details about a specific listing violation.
 */
class ComplianceViolationData extends Data
{
    public function __construct(
        public ?string $listingId,
        public ?string $sku,
        public ?string $offerId,
        public ?string $complianceType,
        #[DataCollectionOf(ComplianceDetailData::class)]
        public ?DataCollection $violations,
    ) {}
}
