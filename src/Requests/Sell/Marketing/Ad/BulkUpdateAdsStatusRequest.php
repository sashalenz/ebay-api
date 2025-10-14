<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Ad;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Bulk Update Ads Status Request
 *
 * Updates ad status in bulk.
 */
class BulkUpdateAdsStatusRequest extends Request
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
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/bulk_update_ads_status";
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
