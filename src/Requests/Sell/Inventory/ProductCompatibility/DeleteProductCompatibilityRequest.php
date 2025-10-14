<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\ProductCompatibility;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Delete Product Compatibility Request
 *
 * Deletes compatibility information for an inventory item.
 *
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/product_compatibility/methods/deleteProductCompatibility
 */
class DeleteProductCompatibilityRequest extends Request
{
    protected string $sku;

    public function __construct(?EbayClient $client, string $sku)
    {
        parent::__construct($client);
        $this->sku = $sku;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/inventory_item/'.urlencode($this->sku).'/product_compatibility';
    }

    public function method(): string
    {
        return 'DELETE';
    }
}
