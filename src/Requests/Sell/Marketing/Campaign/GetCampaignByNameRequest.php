<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Campaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\CampaignData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Campaign By Name Request
 *
 * Retrieves a campaign by name.
 */
class GetCampaignByNameRequest extends Request
{
    protected string $campaignName;

    public function __construct(?EbayClient $client, string $campaignName)
    {
        parent::__construct($client);
        $this->campaignName = $campaignName;
    }

    public function endpoint(): string
    {
        return '/sell/marketing/v1/ad_campaign/get_campaign_by_name';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        return [
            'campaign_name' => $this->campaignName,
        ];
    }

    protected function dto(): ?string
    {
        return CampaignData::class;
    }
}
