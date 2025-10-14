<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Keyword;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class UpdateKeywordRequest extends Request
{
    protected string $campaignId;

    protected string $adGroupId;

    protected string $keywordId;

    protected array $keywordData;

    public function __construct(?EbayClient $client, string $campaignId, string $adGroupId, string $keywordId, array $keywordData)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->adGroupId = $adGroupId;
        $this->keywordId = $keywordId;
        $this->keywordData = $keywordData;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad_group/{$this->adGroupId}/keyword/{$this->keywordId}";
    }

    public function method(): string
    {
        return 'PUT';
    }

    public function body(): array
    {
        return $this->keywordData;
    }
}
