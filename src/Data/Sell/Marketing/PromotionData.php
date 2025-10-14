<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Marketing;

use Spatie\LaravelData\Data;

/**
 * Promotion Data
 *
 * Item promotion/discount information.
 */
class PromotionData extends Data
{
    public function __construct(
        public ?string $promotionId = null,
        public ?string $name = null,
        public ?string $promotionStatus = null,
        public ?string $promotionType = null,
        public ?string $marketplaceId = null,
        public ?string $startDate = null,
        public ?string $endDate = null,
        public ?array $discountRules = null,
        public ?array $inventoryCriterion = null,
        public ?string $priority = null,
    ) {}
}
