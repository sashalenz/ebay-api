<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\AdGroup;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class SuggestBidsRequest extends Request
{
    protected string $campaignId;

    protected string $adGroupId;

    public function __construct(?EbayClient $client, string $campaignId, string $adGroupId)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->adGroupId = $adGroupId;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad_group/{$this->adGroupId}/suggest_bids";
    }

    public function method(): string
    {
        return 'GET';
    }
}
