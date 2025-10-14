<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Logistics\ShippingQuote;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Logistics\ShippingQuoteData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Shipping Quote Request
 *
 * Creates an eBay shipping label quote for a single package in an order.
 */
class CreateShippingQuoteRequest extends Request
{
    protected array $orders = [];

    protected array $packageSpecification = [];

    protected array $shipFrom = [];

    protected array $shipTo = [];

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function orders(array $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    public function packageSpecification(array $packageSpecification): self
    {
        $this->packageSpecification = $packageSpecification;

        return $this;
    }

    public function shipFrom(array $shipFrom): self
    {
        $this->shipFrom = $shipFrom;

        return $this;
    }

    public function shipTo(array $shipTo): self
    {
        $this->shipTo = $shipTo;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/logistics/v1_beta/shipping_quote';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return [
            'orders' => $this->orders,
            'packageSpecification' => $this->packageSpecification,
            'shipFrom' => $this->shipFrom,
            'shipTo' => $this->shipTo,
        ];
    }

    protected function dto(): ?string
    {
        return ShippingQuoteData::class;
    }
}
