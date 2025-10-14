<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Keyword;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\KeywordData;
use Sashalenz\EbayApi\Requests\Request;

class GetKeywordRequest extends Request
{
    protected string $campaignId;

    protected string $adGroupId;

    protected string $keywordId;

    public function __construct(?EbayClient $client, string $campaignId, string $adGroupId, string $keywordId)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->adGroupId = $adGroupId;
        $this->keywordId = $keywordId;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad_group/{$this->adGroupId}/keyword/{$this->keywordId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return KeywordData::class;
    }
}
