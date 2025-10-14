<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Compliance;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Compliance Detail Data
 *
 * Contains specific violation details and corrective recommendations.
 */
class ComplianceDetailData extends Data
{
    public function __construct(
        public ?string $reasonCode,
        public ?string $message,
        public ?string $variation,
        public ?string $violationData,
        #[DataCollectionOf(CorrectiveRecommendationData::class)]
        public ?DataCollection $correctiveRecommendations,
    ) {}
}
