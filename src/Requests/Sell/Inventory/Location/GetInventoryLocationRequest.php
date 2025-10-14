<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Location;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Inventory\InventoryLocationData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Inventory Location Request
 *
 * Retrieves an inventory location.
 */
class GetInventoryLocationRequest extends Request
{
    protected string $merchantLocationKey;

    public function __construct(?EbayClient $client, string $merchantLocationKey)
    {
        parent::__construct($client);
        $this->merchantLocationKey = $merchantLocationKey;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/location/'.urlencode($this->merchantLocationKey);
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return InventoryLocationData::class;
    }
}
