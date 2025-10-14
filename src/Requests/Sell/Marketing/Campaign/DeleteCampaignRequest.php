<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Campaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Delete Campaign Request
 *
 * Deletes a Promoted Listings campaign.
 */
class DeleteCampaignRequest extends Request
{
    protected string $campaignId;

    public function __construct(?EbayClient $client, string $campaignId)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}";
    }

    public function method(): string
    {
        return 'DELETE';
    }
}
