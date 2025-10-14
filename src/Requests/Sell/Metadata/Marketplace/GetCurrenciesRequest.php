<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Metadata\Marketplace;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Currencies Request
 *
 * Retrieves eBay default currency for a specified marketplace.
 */
class GetCurrenciesRequest extends Request
{
    protected MarketplaceId $marketplaceId;

    public function __construct(?EbayClient $client, MarketplaceId $marketplaceId)
    {
        parent::__construct($client);
        $this->marketplaceId = $marketplaceId;
    }

    public function endpoint(): string
    {
        return "/sell/metadata/v1/marketplace/{$this->marketplaceId->value}/get_currencies";
    }

    public function method(): string
    {
        return 'GET';
    }
}
