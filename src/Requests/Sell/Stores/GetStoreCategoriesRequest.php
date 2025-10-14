<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Stores;

use Sashalenz\EbayApi\Data\Sell\Stores\StoreCategoriesData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Store Categories Request
 *
 * Retrieves all custom categories for a seller's eBay store.
 *
 * @see https://developer.ebay.com/api-docs/sell/stores/resources/store/methods/getStoreCategories
 */
class GetStoreCategoriesRequest extends Request
{
    protected ?int $limit = null;

    protected ?int $offset = null;

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
        return '/sell/stores/v1/store/categories';
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
        return StoreCategoriesData::class;
    }
}
