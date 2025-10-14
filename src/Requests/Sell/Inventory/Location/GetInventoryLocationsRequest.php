<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Location;

use Sashalenz\EbayApi\Data\Sell\Inventory\InventoryLocationsData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Inventory Locations Request
 *
 * Retrieves all inventory locations.
 */
class GetInventoryLocationsRequest extends Request
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
        return '/sell/inventory/v1/location';
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
        return InventoryLocationsData::class;
    }
}
