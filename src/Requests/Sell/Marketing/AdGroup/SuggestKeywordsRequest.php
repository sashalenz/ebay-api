<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\AdGroup;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class SuggestKeywordsRequest extends Request
{
    protected string $campaignId;

    protected string $adGroupId;

    protected ?string $adIds = null;

    public function __construct(?EbayClient $client, string $campaignId, string $adGroupId)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->adGroupId = $adGroupId;
    }

    public function adIds(string $adIds): self
    {
        $this->adIds = $adIds;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad_group/{$this->adGroupId}/suggest_keywords";
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->adIds !== null) {
            $query['ad_ids'] = $this->adIds;
        }

        return $query;
    }
}
