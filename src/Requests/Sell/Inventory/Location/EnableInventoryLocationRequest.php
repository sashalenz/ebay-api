<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Location;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Enable Inventory Location Request
 *
 * Enables a disabled inventory location.
 */
class EnableInventoryLocationRequest extends Request
{
    protected string $merchantLocationKey;

    public function __construct(?EbayClient $client, string $merchantLocationKey)
    {
        parent::__construct($client);
        $this->merchantLocationKey = $merchantLocationKey;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/location/'.urlencode($this->merchantLocationKey).'/enable';
    }

    public function method(): string
    {
        return 'POST';
    }
}
