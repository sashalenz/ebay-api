<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Ad;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\AdsData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Ads Request
 *
 * Retrieves all ads for a campaign.
 */
class GetAdsRequest extends Request
{
    protected string $campaignId;

    protected ?string $adStatus = null;

    protected ?int $limit = null;

    protected ?int $offset = null;

    public function __construct(?EbayClient $client, string $campaignId)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
    }

    public function adStatus(string $adStatus): self
    {
        $this->adStatus = $adStatus;

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
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad";
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->adStatus !== null) {
            $query['ad_status'] = $this->adStatus;
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
        return AdsData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'ads';
    }
}
