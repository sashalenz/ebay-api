<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Finances\Payout;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Finances\PayoutsData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Payouts Request
 *
 * Retrieves the details of seller payouts matching search criteria.
 */
class GetPayoutsRequest extends Request
{
    protected ?string $filter = null;

    protected ?string $sort = null;

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

    public function sort(string $sort): self
    {
        $this->sort = $sort;

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
        return '/sell/finances/v1/payout';
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

        if ($this->sort !== null) {
            $query['sort'] = $this->sort;
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
        return PayoutsData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'payouts';
    }
}
