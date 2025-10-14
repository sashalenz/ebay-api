<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Campaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\CampaignsData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Campaigns Request
 *
 * Retrieves all Promoted Listings campaigns.
 */
class GetCampaignsRequest extends Request
{
    protected ?string $campaignName = null;

    protected ?string $campaignStatus = null;

    protected ?string $fundingStrategy = null;

    protected ?int $limit = null;

    protected ?int $offset = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function campaignName(string $campaignName): self
    {
        $this->campaignName = $campaignName;

        return $this;
    }

    public function campaignStatus(string $campaignStatus): self
    {
        $this->campaignStatus = $campaignStatus;

        return $this;
    }

    public function fundingStrategy(string $fundingStrategy): self
    {
        $this->fundingStrategy = $fundingStrategy;

        return $this;
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
        return '/sell/marketing/v1/ad_campaign';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->campaignName !== null) {
            $query['campaign_name'] = $this->campaignName;
        }

        if ($this->campaignStatus !== null) {
            $query['campaign_status'] = $this->campaignStatus;
        }

        if ($this->fundingStrategy !== null) {
            $query['funding_strategy'] = $this->fundingStrategy;
        }

        if ($this->limit !== null) {
            $query['limit'] = $this->limit;
        }

        if ($this->offset !== null) {
            $query['offset'] = $this->offset;
        }

        return $query;
    }

    protected function dto(): ?string
    {
        return CampaignsData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'campaigns';
    }
}
