<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Metadata\Marketplace;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Hazardous Materials Labels Request
 *
 * Retrieves available hazardous materials label information for a given eBay marketplace.
 */
class GetHazardousMaterialsLabelsRequest extends Request
{
    protected MarketplaceId $marketplaceId;

    public function __construct(?EbayClient $client, MarketplaceId $marketplaceId)
    {
        parent::__construct($client);
        $this->marketplaceId = $marketplaceId;
    }

    public function endpoint(): string
    {
        return "/sell/metadata/v1/marketplace/{$this->marketplaceId->value}/get_hazardous_materials_labels";
    }

    public function method(): string
    {
        return 'GET';
    }
}
