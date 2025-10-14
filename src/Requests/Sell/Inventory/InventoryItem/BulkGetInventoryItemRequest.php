<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Bulk Get Inventory Item Request
 *
 * Retrieves up to 25 inventory item records by SKU.
 *
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/inventory_item/methods/bulkGetInventoryItem
 */
class BulkGetInventoryItemRequest extends Request
{
    /** @var array<string> */
    protected array $skus = [];

    /**
     * Create a new Bulk Get Inventory Item request
     *
     * @param  EbayClient|null  $client  The eBay API client (auto-resolved if null)
     */
    public function __construct(?EbayClient $client)
    {
        parent::__construct($client);
    }

    /**
     * Add a SKU to retrieve
     */
    public function addSku(string $sku): self
    {
        $this->skus[] = $sku;

        return $this;
    }

    /**
     * Set SKUs to retrieve
     *
     * @param  array<string>  $skus
     */
    public function skus(array $skus): self
    {
        $this->skus = $skus;

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

        if (empty($this->skus)) {
            $errors[] = 'At least one SKU is required';
        }

        if (count($this->skus) > 25) {
            $errors[] = 'Maximum 25 SKUs allowed per request';
        }

        return $errors;
    }

    /**
     * Get the API endpoint path
     */
    public function endpoint(): string
    {
        return '/sell/inventory/v1/bulk_get_inventory_item';
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
            'requests' => array_map(fn ($sku) => ['sku' => $sku], $this->skus),
        ];
    }
}
