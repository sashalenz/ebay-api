<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Delete Inventory Item Request
 *
 * Deletes an inventory item record and all associated data.
 * This will also delete unpublished offers, single-variation listings, and remove SKU from groups.
 *
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/inventory_item/methods/deleteInventoryItem
 */
class DeleteInventoryItemRequest extends Request
{
    protected string $sku;

    /**
     * Create a new Delete Inventory Item request
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
        return 'DELETE';
    }
}
