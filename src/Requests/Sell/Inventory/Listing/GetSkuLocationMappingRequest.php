<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Listing;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get SKU Location Mapping Request
 *
 * Retrieves the SKU location mapping for a listing.
 */
class GetSkuLocationMappingRequest extends Request
{
    protected string $listingId;

    public function __construct(?EbayClient $client, string $listingId)
    {
        parent::__construct($client);
        $this->listingId = $listingId;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/listing/'.urlencode($this->listingId).'/sku_location_mapping';
    }

    public function method(): string
    {
        return 'GET';
    }
}
