<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Campaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Suggest Budget Request
 *
 * Gets budget recommendation for a campaign.
 */
class SuggestBudgetRequest extends Request
{
    protected string $campaignId;

    public function __construct(?EbayClient $client, string $campaignId)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/suggest_budget";
    }

    public function method(): string
    {
        return 'GET';
    }
}
