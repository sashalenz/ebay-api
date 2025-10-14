<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Campaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Bidding Strategy Request
 *
 * Updates the bidding strategy for a campaign.
 */
class UpdateBiddingStrategyRequest extends Request
{
    protected string $campaignId;

    protected array $biddingStrategy;

    public function __construct(?EbayClient $client, string $campaignId, array $biddingStrategy)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->biddingStrategy = $biddingStrategy;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/update_bidding_strategy";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return $this->biddingStrategy;
    }
}
