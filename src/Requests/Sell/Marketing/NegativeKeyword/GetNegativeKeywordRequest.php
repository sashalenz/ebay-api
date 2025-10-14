<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\NegativeKeyword;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\NegativeKeywordData;
use Sashalenz\EbayApi\Requests\Request;

class GetNegativeKeywordRequest extends Request
{
    protected string $campaignId;

    protected string $adGroupId;

    protected string $negativeKeywordId;

    public function __construct(?EbayClient $client, string $campaignId, string $adGroupId, string $negativeKeywordId)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->adGroupId = $adGroupId;
        $this->negativeKeywordId = $negativeKeywordId;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad_group/{$this->adGroupId}/negative_keyword/{$this->negativeKeywordId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return NegativeKeywordData::class;
    }
}
