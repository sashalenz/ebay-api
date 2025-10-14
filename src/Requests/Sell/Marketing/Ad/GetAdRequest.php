<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Ad;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\AdData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Ad Request
 *
 * Retrieves a single ad.
 */
class GetAdRequest extends Request
{
    protected string $campaignId;

    protected string $adId;

    public function __construct(?EbayClient $client, string $campaignId, string $adId)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->adId = $adId;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad/{$this->adId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return AdData::class;
    }
}
