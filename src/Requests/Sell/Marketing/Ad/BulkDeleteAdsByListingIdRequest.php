<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Ad;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Bulk Delete Ads By Listing ID Request
 *
 * Deletes ads in bulk using listing IDs.
 */
class BulkDeleteAdsByListingIdRequest extends Request
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
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/bulk_delete_ads_by_listing_id";
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
