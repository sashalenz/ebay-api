<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\NegativeKeyword;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class UpdateNegativeKeywordRequest extends Request
{
    protected string $campaignId;

    protected string $adGroupId;

    protected string $negativeKeywordId;

    protected array $negativeKeywordData;

    public function __construct(?EbayClient $client, string $campaignId, string $adGroupId, string $negativeKeywordId, array $negativeKeywordData)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->adGroupId = $adGroupId;
        $this->negativeKeywordId = $negativeKeywordId;
        $this->negativeKeywordData = $negativeKeywordData;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad_group/{$this->adGroupId}/negative_keyword/{$this->negativeKeywordId}";
    }

    public function method(): string
    {
        return 'PUT';
    }

    public function body(): array
    {
        return $this->negativeKeywordData;
    }
}
