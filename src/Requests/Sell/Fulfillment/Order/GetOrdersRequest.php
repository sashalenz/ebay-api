<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Fulfillment\Order;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Fulfillment\OrdersData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Orders Request
 *
 * Retrieves the details of orders matching search criteria.
 */
class GetOrdersRequest extends Request
{
    protected ?string $filter = null;

    protected ?string $fieldGroups = null;

    protected ?string $orderIds = null;

    protected ?int $limit = null;

    protected ?int $offset = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function filter(string $filter): self
    {
        $this->filter = $filter;

        return $this;
    }

    public function fieldGroups(string $fieldGroups): self
    {
        $this->fieldGroups = $fieldGroups;

        return $this;
    }

    public function orderIds(string $orderIds): self
    {
        $this->orderIds = $orderIds;

        return $this;
    }

    public function limit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    public function offset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/fulfillment/v1/order';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->filter !== null) {
            $query['filter'] = $this->filter;
        }

        if ($this->fieldGroups !== null) {
            $query['fieldGroups'] = $this->fieldGroups;
        }

        if ($this->orderIds !== null) {
            $query['orderIds'] = $this->orderIds;
        }

        if ($this->limit !== null) {
            $query['limit'] = $this->limit;
        }

        if ($this->offset !== null) {
            $query['offset'] = $this->offset;
        }

        return $query;
    }

    protected function dto(): ?string
    {
        return OrdersData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'orders';
    }
}
