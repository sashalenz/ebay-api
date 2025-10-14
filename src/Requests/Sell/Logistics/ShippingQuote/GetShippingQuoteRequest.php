<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Logistics\ShippingQuote;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Logistics\ShippingQuoteData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Shipping Quote Request
 *
 * Retrieves details on an eBay shipping label quote.
 */
class GetShippingQuoteRequest extends Request
{
    protected string $shippingQuoteId;

    public function __construct(?EbayClient $client, string $shippingQuoteId)
    {
        parent::__construct($client);
        $this->shippingQuoteId = $shippingQuoteId;
    }

    public function endpoint(): string
    {
        return "/sell/logistics/v1_beta/shipping_quote/{$this->shippingQuoteId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return ShippingQuoteData::class;
    }
}
