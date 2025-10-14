<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Compliance;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Corrective Recommendation Data
 *
 * Contains recommended actions to fix a compliance violation.
 */
class CorrectiveRecommendationData extends Data
{
    public function __construct(
        public ?string $recommendationText,
        #[DataCollectionOf(ComplianceRecommendationValueData::class)]
        public ?DataCollection $recommendationValues,
    ) {}
}
