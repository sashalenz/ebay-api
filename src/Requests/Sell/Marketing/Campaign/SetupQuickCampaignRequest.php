<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Campaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\CampaignData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Setup Quick Campaign Request
 *
 * Creates a quick campaign with recommended settings.
 */
class SetupQuickCampaignRequest extends Request
{
    protected array $quickCampaignData;

    public function __construct(?EbayClient $client, array $quickCampaignData)
    {
        parent::__construct($client);
        $this->quickCampaignData = $quickCampaignData;
    }

    public function endpoint(): string
    {
        return '/sell/marketing/v1/ad_campaign/setup_quick_campaign';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return $this->quickCampaignData;
    }

    protected function dto(): ?string
    {
        return CampaignData::class;
    }
}
