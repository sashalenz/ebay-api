<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Compliance;

use Spatie\LaravelData\Data;

/**
 * Compliance Recommendation Value Data
 *
 * Contains specific recommendation values.
 */
class ComplianceRecommendationValueData extends Data
{
    public function __construct(
        public ?string $key,
        public ?string $value,
    ) {}
}
