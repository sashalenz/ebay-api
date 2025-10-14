<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Inventory\InventoryItemData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Inventory Item Request
 *
 * Retrieves the inventory item record for a given SKU.
 *
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/inventory_item/methods/getInventoryItem
 */
class GetInventoryItemRequest extends Request
{
    protected string $sku;

    /**
     * Create a new Get Inventory Item request
     *
     * @param  EbayClient|null  $client  The eBay API client (auto-resolved if null)
     * @param  string  $sku  The seller-defined SKU value (max 50 chars)
     */
    public function __construct(?EbayClient $client, string $sku)
    {
        parent::__construct($client);
        $this->sku = $sku;
    }

    /**
     * Get the API endpoint path
     */
    public function endpoint(): string
    {
        return '/sell/inventory/v1/inventory_item/'.urlencode($this->sku);
    }

    /**
     * Get the HTTP method for this request
     */
    public function method(): string
    {
        return 'GET';
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
}
