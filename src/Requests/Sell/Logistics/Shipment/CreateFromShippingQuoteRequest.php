<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Logistics\Shipment;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Logistics\ShipmentData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create From Shipping Quote Request
 *
 * Creates a shipment from a shipping quote and generates a shipping label.
 */
class CreateFromShippingQuoteRequest extends Request
{
    protected string $rateId;

    protected string $shippingQuoteId;

    protected ?array $additionalOptions = null;

    protected ?string $labelCustomMessage = null;

    protected ?string $labelSize = null;

    protected ?string $labelFormat = null;

    public function __construct(?EbayClient $client, string $rateId, string $shippingQuoteId)
    {
        parent::__construct($client);
        $this->rateId = $rateId;
        $this->shippingQuoteId = $shippingQuoteId;
    }

    public function additionalOptions(array $additionalOptions): self
    {
        $this->additionalOptions = $additionalOptions;

        return $this;
    }

    public function labelCustomMessage(string $labelCustomMessage): self
    {
        $this->labelCustomMessage = $labelCustomMessage;

        return $this;
    }

    public function labelSize(string $labelSize): self
    {
        $this->labelSize = $labelSize;

        return $this;
    }

    public function labelFormat(string $labelFormat): self
    {
        $this->labelFormat = $labelFormat;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/logistics/v1_beta/shipment/create_from_shipping_quote';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        $body = [
            'rateId' => $this->rateId,
            'shippingQuoteId' => $this->shippingQuoteId,
        ];

        if ($this->additionalOptions !== null) {
            $body['additionalOptions'] = $this->additionalOptions;
        }

        if ($this->labelCustomMessage !== null) {
            $body['labelCustomMessage'] = $this->labelCustomMessage;
        }

        if ($this->labelSize !== null) {
            $body['labelSize'] = $this->labelSize;
        }

        if ($this->labelFormat !== null) {
            $body['labelFormat'] = $this->labelFormat;
        }

        return $body;
    }

    protected function dto(): ?string
    {
        return ShipmentData::class;
    }
}
