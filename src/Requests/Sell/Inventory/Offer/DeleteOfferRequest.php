<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Offer;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Delete Offer Request
 *
 * Deletes an offer.
 */
class DeleteOfferRequest extends Request
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
        return 'DELETE';
    }
}
