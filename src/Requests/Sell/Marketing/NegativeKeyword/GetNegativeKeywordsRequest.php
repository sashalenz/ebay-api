<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\NegativeKeyword;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class GetNegativeKeywordsRequest extends Request
{
    protected string $campaignId;

    protected string $adGroupId;

    protected ?int $limit = null;

    protected ?int $offset = null;

    public function __construct(?EbayClient $client, string $campaignId, string $adGroupId)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->adGroupId = $adGroupId;
    }

    public function limit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    public function offset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad_group/{$this->adGroupId}/negative_keyword";
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->limit !== null) {
            $query['limit'] = $this->limit;
        }

        if ($this->offset !== null) {
            $query['offset'] = $this->offset;
        }

        return $query;
    }
}
