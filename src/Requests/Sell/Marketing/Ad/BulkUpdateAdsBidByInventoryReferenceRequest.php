<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Ad;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Bulk Update Ads Bid By Inventory Reference Request
 *
 * Updates ad bids in bulk using inventory references (SKUs).
 */
class BulkUpdateAdsBidByInventoryReferenceRequest extends Request
{
    protected string $campaignId;

    protected array $requests;

    public function __construct(?EbayClient $client, string $campaignId, array $requests)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->requests = $requests;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/bulk_update_ads_bid_by_inventory_reference";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return ['requests' => $this->requests];
    }
}
