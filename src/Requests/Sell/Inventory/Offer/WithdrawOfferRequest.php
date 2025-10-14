<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Offer;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Inventory\WithdrawResponseData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Withdraw Offer Request
 *
 * Withdraws (ends) a published offer/listing.
 */
class WithdrawOfferRequest extends Request
{
    protected string $offerId;

    public function __construct(?EbayClient $client, string $offerId)
    {
        parent::__construct($client);
        $this->offerId = $offerId;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/offer/'.urlencode($this->offerId).'/withdraw';
    }

    public function method(): string
    {
        return 'POST';
    }

    protected function dto(): ?string
    {
        return WithdrawResponseData::class;
    }
}
