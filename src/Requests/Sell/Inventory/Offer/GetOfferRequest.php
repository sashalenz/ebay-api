<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Offer;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Inventory\OfferData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Offer Request
 *
 * Retrieves a single offer.
 */
class GetOfferRequest extends Request
{
    protected string $offerId;

    public function __construct(?EbayClient $client, string $offerId)
    {
        parent::__construct($client);
        $this->offerId = $offerId;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/offer/'.urlencode($this->offerId);
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return OfferData::class;
    }
}
