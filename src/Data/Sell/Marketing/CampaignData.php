<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Marketing;

use Spatie\LaravelData\Data;

/**
 * Campaign Data
 *
 * Promoted Listings campaign information.
 */
class CampaignData extends Data
{
    public function __construct(
        public ?string $campaignId = null,
        public ?string $campaignName = null,
        public ?string $campaignStatus = null,
        public ?string $fundingStrategy = null,
        public ?string $marketplaceId = null,
        public ?array $startDate = null,
        public ?array $endDate = null,
        public ?array $budget = null,
        public ?string $campaignCriterionType = null,
        public ?array $campaignCriterion = null,
        public ?array $bidPercentage = null,
    ) {}
}
