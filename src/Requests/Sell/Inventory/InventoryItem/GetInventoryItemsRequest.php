<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Inventory\InventoryItemData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Inventory Items Request
 *
 * Retrieves all inventory item records defined for the seller's account.
 *
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/inventory_item/methods/getInventoryItems
 */
class GetInventoryItemsRequest extends Request
{
    protected ?int $limit = null;

    protected ?int $offset = null;

    /**
     * Create a new Get Inventory Items request
     *
     * @param  EbayClient|null  $client  The eBay API client (auto-resolved if null)
     */
    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    /**
     * Set the number of records to return per page
     *
     * @param  int  $limit  Number of records (1-100)
     */
    public function limit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * Set the offset for pagination
     *
     * @param  int  $offset  Number of records to skip
     */
    public function offset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * Get the API endpoint path
     */
    public function endpoint(): string
    {
        return '/sell/inventory/v1/inventory_item';
    }

    /**
     * Get the HTTP method for this request
     */
    public function method(): string
    {
        return 'GET';
    }

    /**
     * Get query parameters for the request
     */
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

    /**
     * Get the Data class for automatic response mapping
     *
     * @return class-string<InventoryItemData>
     */
    public function dto(): string
    {
        return InventoryItemData::class;
    }

    /**
     * Get the key to extract from response before mapping to Data
     */
    public function dtoKey(): string
    {
        return 'inventoryItems';
    }
}
