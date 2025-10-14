<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItemGroup;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Delete Inventory Item Group Request
 *
 * Deletes an inventory item group.
 *
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/inventory_item_group/methods/deleteInventoryItemGroup
 */
class DeleteInventoryItemGroupRequest extends Request
{
    protected string $inventoryItemGroupKey;

    public function __construct(?EbayClient $client, string $inventoryItemGroupKey)
    {
        parent::__construct($client);
        $this->inventoryItemGroupKey = $inventoryItemGroupKey;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/inventory_item_group/'.urlencode($this->inventoryItemGroupKey);
    }

    public function method(): string
    {
        return 'DELETE';
    }
}
