<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Metadata\Marketplace;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Product Safety Labels Request
 *
 * Retrieves available product safety label information for a given eBay marketplace.
 */
class GetProductSafetyLabelsRequest extends Request
{
    protected MarketplaceId $marketplaceId;

    public function __construct(?EbayClient $client, MarketplaceId $marketplaceId)
    {
        parent::__construct($client);
        $this->marketplaceId = $marketplaceId;
    }

    public function endpoint(): string
    {
        return "/sell/metadata/v1/marketplace/{$this->marketplaceId->value}/get_product_safety_labels";
    }

    public function method(): string
    {
        return 'GET';
    }
}
