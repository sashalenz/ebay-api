<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Keyword;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class BulkCreateKeywordRequest extends Request
{
    protected string $campaignId;

    protected string $adGroupId;

    protected array $keywords;

    public function __construct(?EbayClient $client, string $campaignId, string $adGroupId, array $keywords)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->adGroupId = $adGroupId;
        $this->keywords = $keywords;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad_group/{$this->adGroupId}/bulk_create_keyword";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return ['keywords' => $this->keywords];
    }
}
