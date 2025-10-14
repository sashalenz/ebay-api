<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Ad;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Delete Ad Request
 *
 * Deletes a single ad.
 */
class DeleteAdRequest extends Request
{
    protected string $campaignId;

    protected string $adId;

    public function __construct(?EbayClient $client, string $campaignId, string $adId)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->adId = $adId;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad/{$this->adId}";
    }

    public function method(): string
    {
        return 'DELETE';
    }
}
