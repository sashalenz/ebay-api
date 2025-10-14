<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Campaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\CampaignData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Campaign Request
 *
 * Creates a Promoted Listings campaign.
 */
class CreateCampaignRequest extends Request
{
    protected array $campaignData;

    public function __construct(?EbayClient $client, array $campaignData)
    {
        parent::__construct($client);
        $this->campaignData = $campaignData;
    }

    public function endpoint(): string
    {
        return '/sell/marketing/v1/ad_campaign';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return $this->campaignData;
    }

    protected function dto(): ?string
    {
        return CampaignData::class;
    }
}
