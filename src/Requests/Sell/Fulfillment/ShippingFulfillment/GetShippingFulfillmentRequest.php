<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Fulfillment\ShippingFulfillment;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Fulfillment\ShippingFulfillmentData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Shipping Fulfillment Request
 *
 * Retrieves details of a shipping fulfillment.
 */
class GetShippingFulfillmentRequest extends Request
{
    protected string $orderId;

    protected string $fulfillmentId;

    public function __construct(?EbayClient $client, string $orderId, string $fulfillmentId)
    {
        parent::__construct($client);
        $this->orderId = $orderId;
        $this->fulfillmentId = $fulfillmentId;
    }

    public function endpoint(): string
    {
        return "/sell/fulfillment/v1/order/{$this->orderId}/shipping_fulfillment/{$this->fulfillmentId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return ShippingFulfillmentData::class;
    }
}
