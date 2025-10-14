<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Ad;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\AdData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Ad By Listing ID Request
 *
 * Creates a single ad using a listing ID.
 */
class CreateAdByListingIdRequest extends Request
{
    protected string $campaignId;

    protected array $adData;

    public function __construct(?EbayClient $client, string $campaignId, array $adData)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->adData = $adData;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return $this->adData;
    }

    protected function dto(): ?string
    {
        return AdData::class;
    }
}
