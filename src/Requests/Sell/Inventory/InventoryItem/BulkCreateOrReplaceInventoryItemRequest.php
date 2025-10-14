<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Inventory\InventoryItemData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Bulk Create Or Replace Inventory Item Request
 *
 * Creates or replaces up to 25 inventory item records.
 *
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/inventory_item/methods/bulkCreateOrReplaceInventoryItem
 */
class BulkCreateOrReplaceInventoryItemRequest extends Request
{
    /**
     * @var array<array{sku: string, inventoryItem: InventoryItemData}>
     */
    protected array $requests = [];

    /**
     * Create a new Bulk Create Or Replace Inventory Item request
     *
     * @param  EbayClient|null  $client  The eBay API client (auto-resolved if null)
     */
    public function __construct(?EbayClient $client)
    {
        parent::__construct($client);
    }

    /**
     * Add an inventory item request
     */
    public function addRequest(string $sku, InventoryItemData $inventoryItem): self
    {
        $this->requests[] = [
            'sku' => $sku,
            'inventoryItem' => $inventoryItem->toArray(),
        ];

        return $this;
    }

    /**
     * Validate the request before sending
     *
     * @return array<string>
     */
    protected function validate(): array
    {
        $errors = [];

        if (empty($this->requests)) {
            $errors[] = 'At least one inventory item is required';
        }

        if (count($this->requests) > 25) {
            $errors[] = 'Maximum 25 inventory items allowed per request';
        }

        return $errors;
    }

    /**
     * Get the API endpoint path
     */
    public function endpoint(): string
    {
        return '/sell/inventory/v1/bulk_create_or_replace_inventory_item';
    }

    /**
     * Get the HTTP method for this request
     */
    public function method(): string
    {
        return 'POST';
    }

    /**
     * Get the request body
     */
    public function body(): array
    {
        return [
            'requests' => $this->requests,
        ];
    }
}
