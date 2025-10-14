<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Campaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Ad Rate Strategy Request
 *
 * Updates the ad rate strategy for a campaign.
 */
class UpdateAdRateStrategyRequest extends Request
{
    protected string $campaignId;

    protected array $rateStrategy;

    public function __construct(?EbayClient $client, string $campaignId, array $rateStrategy)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->rateStrategy = $rateStrategy;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/update_ad_rate_strategy";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return $this->rateStrategy;
    }
}
