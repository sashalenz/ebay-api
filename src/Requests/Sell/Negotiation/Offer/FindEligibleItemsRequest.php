<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Negotiation\Offer;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Negotiation\PagedEligibleItemCollectionData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Find Eligible Items Request
 *
 * Retrieves listings that are eligible for a seller-initiated offer to a buyer.
 */
class FindEligibleItemsRequest extends Request
{
    protected ?int $limit = null;

    protected ?int $offset = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
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
        return '/sell/negotiation/v1/find_eligible_items';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

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
        return PagedEligibleItemCollectionData::class;
    }
}
