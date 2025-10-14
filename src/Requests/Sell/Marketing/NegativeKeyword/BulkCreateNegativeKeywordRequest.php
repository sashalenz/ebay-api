<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\NegativeKeyword;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class BulkCreateNegativeKeywordRequest extends Request
{
    protected string $campaignId;

    protected string $adGroupId;

    protected array $negativeKeywords;

    public function __construct(?EbayClient $client, string $campaignId, string $adGroupId, array $negativeKeywords)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->adGroupId = $adGroupId;
        $this->negativeKeywords = $negativeKeywords;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad_group/{$this->adGroupId}/bulk_create_negative_keyword";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return ['negativeKeywords' => $this->negativeKeywords];
    }
}
