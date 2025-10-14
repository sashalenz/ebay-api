<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Listing;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Or Replace SKU Location Mapping Request
 *
 * Creates or replaces an SKU location mapping for a listing.
 */
class CreateOrReplaceSkuLocationMappingRequest extends Request
{
    protected string $listingId;

    protected string $sku;

    protected string $merchantLocationKey;

    public function __construct(?EbayClient $client, string $listingId, string $sku, string $merchantLocationKey)
    {
        parent::__construct($client);
        $this->listingId = $listingId;
        $this->sku = $sku;
        $this->merchantLocationKey = $merchantLocationKey;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/listing/'.urlencode($this->listingId).'/sku_location_mapping';
    }

    public function method(): string
    {
        return 'PUT';
    }

    public function body(): array
    {
        return [
            'sku' => $this->sku,
            'merchantLocationKey' => $this->merchantLocationKey,
        ];
    }
}
