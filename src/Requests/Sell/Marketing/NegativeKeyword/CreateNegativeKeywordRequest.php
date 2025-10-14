<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\NegativeKeyword;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\NegativeKeywordData;
use Sashalenz\EbayApi\Requests\Request;

class CreateNegativeKeywordRequest extends Request
{
    protected string $campaignId;

    protected string $adGroupId;

    protected array $negativeKeywordData;

    public function __construct(?EbayClient $client, string $campaignId, string $adGroupId, array $negativeKeywordData)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->adGroupId = $adGroupId;
        $this->negativeKeywordData = $negativeKeywordData;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad_group/{$this->adGroupId}/negative_keyword";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return $this->negativeKeywordData;
    }

    protected function dto(): ?string
    {
        return NegativeKeywordData::class;
    }
}
