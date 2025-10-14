<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Fulfillment\Order;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Fulfillment\OrderData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Order Request
 *
 * Retrieves the details of a specific order.
 */
class GetOrderRequest extends Request
{
    protected string $orderId;

    protected ?string $fieldGroups = null;

    public function __construct(?EbayClient $client, string $orderId)
    {
        parent::__construct($client);
        $this->orderId = $orderId;
    }

    public function fieldGroups(string $fieldGroups): self
    {
        $this->fieldGroups = $fieldGroups;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/fulfillment/v1/order/{$this->orderId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->fieldGroups !== null) {
            $query['fieldGroups'] = $this->fieldGroups;
        }

        return $query;
    }

    protected function dto(): ?string
    {
        return OrderData::class;
    }
}
