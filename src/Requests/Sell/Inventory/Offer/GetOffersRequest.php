<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Offer;

use Sashalenz\EbayApi\Data\Sell\Inventory\OffersData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Offers Request
 *
 * Retrieves all offers for the seller.
 */
class GetOffersRequest extends Request
{
    protected ?string $sku = null;

    protected ?int $limit = null;

    protected ?int $offset = null;

    public function sku(string $sku): self
    {
        $this->sku = $sku;

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
        return '/sell/inventory/v1/offer';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->sku !== null) {
            $query['sku'] = $this->sku;
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
        return OffersData::class;
    }
}
