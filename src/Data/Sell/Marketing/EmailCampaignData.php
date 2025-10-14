<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Marketing;

use Spatie\LaravelData\Data;

/**
 * Email Campaign Data
 *
 * Store email campaign information.
 */
class EmailCampaignData extends Data
{
    public function __construct(
        public ?string $emailCampaignId = null,
        public ?string $subject = null,
        public ?string $emailCampaignStatus = null,
        public ?array $audienceId = null,
        public ?string $scheduledDate = null,
    ) {}
}
