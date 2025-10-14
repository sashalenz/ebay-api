<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Offer;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Inventory\PublishResponseData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Publish Offer Request
 *
 * Publishes an offer to create an eBay listing.
 */
class PublishOfferRequest extends Request
{
    protected string $offerId;

    public function __construct(?EbayClient $client, string $offerId)
    {
        parent::__construct($client);
        $this->offerId = $offerId;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/offer/'.urlencode($this->offerId).'/publish';
    }

    public function method(): string
    {
        return 'POST';
    }

    protected function dto(): ?string
    {
        return PublishResponseData::class;
    }
}
