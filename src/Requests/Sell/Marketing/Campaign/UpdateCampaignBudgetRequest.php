<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Campaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Campaign Budget Request
 *
 * Updates the budget for a campaign.
 */
class UpdateCampaignBudgetRequest extends Request
{
    protected string $campaignId;

    protected array $budget;

    public function __construct(?EbayClient $client, string $campaignId, array $budget)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->budget = $budget;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/update_campaign_budget";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return $this->budget;
    }
}
