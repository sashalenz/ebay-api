<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Ad;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Bulk Update Ads Status By Listing ID Request
 *
 * Updates ad status in bulk using listing IDs.
 */
class BulkUpdateAdsStatusByListingIdRequest extends Request
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
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/bulk_update_ads_status_by_listing_id";
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
