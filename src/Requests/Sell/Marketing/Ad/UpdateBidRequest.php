<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Ad;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Bid Request
 *
 * Updates the bid percentage for an ad.
 */
class UpdateBidRequest extends Request
{
    protected string $campaignId;

    protected string $adId;

    protected array $bidData;

    public function __construct(?EbayClient $client, string $campaignId, string $adId, array $bidData)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->adId = $adId;
        $this->bidData = $bidData;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad/{$this->adId}/update_bid";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return $this->bidData;
    }
}
