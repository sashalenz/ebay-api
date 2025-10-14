<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Campaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\CampaignData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Clone Campaign Request
 *
 * Clones a Promoted Listings campaign.
 */
class CloneCampaignRequest extends Request
{
    protected string $campaignId;

    protected array $cloneData;

    public function __construct(?EbayClient $client, string $campaignId, array $cloneData)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->cloneData = $cloneData;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/clone";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return $this->cloneData;
    }

    protected function dto(): ?string
    {
        return CampaignData::class;
    }
}
