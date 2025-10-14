<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Fulfillment\ShippingFulfillment;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Fulfillment\ShippingFulfillmentsData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Shipping Fulfillments Request
 *
 * Retrieves the details of all shipping fulfillments defined for an order.
 */
class GetShippingFulfillmentsRequest extends Request
{
    protected string $orderId;

    public function __construct(?EbayClient $client, string $orderId)
    {
        parent::__construct($client);
        $this->orderId = $orderId;
    }

    public function endpoint(): string
    {
        return "/sell/fulfillment/v1/order/{$this->orderId}/shipping_fulfillment";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return ShippingFulfillmentsData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'fulfillments';
    }
}
