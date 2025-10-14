<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Stores;

use Sashalenz\EbayApi\Data\Sell\Stores\StoreData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Store Request
 *
 * Retrieves configuration information for a seller's eBay store.
 *
 * @see https://developer.ebay.com/api-docs/sell/stores/resources/store/methods/getStore
 */
class GetStoreRequest extends Request
{
    public function endpoint(): string
    {
        return '/sell/stores/v1/store';
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return StoreData::class;
    }
}
