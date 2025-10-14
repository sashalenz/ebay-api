<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Keyword;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\KeywordData;
use Sashalenz\EbayApi\Requests\Request;

class CreateKeywordRequest extends Request
{
    protected string $campaignId;

    protected string $adGroupId;

    protected array $keywordData;

    public function __construct(?EbayClient $client, string $campaignId, string $adGroupId, array $keywordData)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->adGroupId = $adGroupId;
        $this->keywordData = $keywordData;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad_group/{$this->adGroupId}/keyword";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return $this->keywordData;
    }

    protected function dto(): ?string
    {
        return KeywordData::class;
    }
}
