<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Fulfillment\ShippingFulfillment;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Shipping Fulfillment Request
 *
 * Creates a shipping fulfillment for one or more line items with shipment tracking information.
 */
class CreateShippingFulfillmentRequest extends Request
{
    protected string $orderId;

    protected array $lineItems = [];

    protected ?string $shipmentTrackingNumber = null;

    protected ?string $shippingCarrierCode = null;

    protected ?string $shippedDate = null;

    protected ?string $shippingServiceCode = null;

    public function __construct(?EbayClient $client, string $orderId)
    {
        parent::__construct($client);
        $this->orderId = $orderId;
    }

    public function lineItems(array $lineItems): self
    {
        $this->lineItems = $lineItems;

        return $this;
    }

    public function shipmentTrackingNumber(string $shipmentTrackingNumber): self
    {
        $this->shipmentTrackingNumber = $shipmentTrackingNumber;

        return $this;
    }

    public function shippingCarrierCode(string $shippingCarrierCode): self
    {
        $this->shippingCarrierCode = $shippingCarrierCode;

        return $this;
    }

    public function shippedDate(string $shippedDate): self
    {
        $this->shippedDate = $shippedDate;

        return $this;
    }

    public function shippingServiceCode(string $shippingServiceCode): self
    {
        $this->shippingServiceCode = $shippingServiceCode;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/fulfillment/v1/order/{$this->orderId}/shipping_fulfillment";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        $body = [
            'lineItems' => $this->lineItems,
        ];

        if ($this->shipmentTrackingNumber !== null) {
            $body['shipmentTrackingNumber'] = $this->shipmentTrackingNumber;
        }

        if ($this->shippingCarrierCode !== null) {
            $body['shippingCarrierCode'] = $this->shippingCarrierCode;
        }

        if ($this->shippedDate !== null) {
            $body['shippedDate'] = $this->shippedDate;
        }

        if ($this->shippingServiceCode !== null) {
            $body['shippingServiceCode'] = $this->shippingServiceCode;
        }

        return $body;
    }
}
