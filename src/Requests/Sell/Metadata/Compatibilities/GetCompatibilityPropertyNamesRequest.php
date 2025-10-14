<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Metadata\Compatibilities;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Compatibility Property Names Request
 *
 * Retrieves product compatibility property names for a specified category.
 */
class GetCompatibilityPropertyNamesRequest extends Request
{
    protected MarketplaceId $marketplaceId;

    protected string $categoryTreeId;

    protected string $categoryId;

    public function __construct(?EbayClient $client, MarketplaceId $marketplaceId, string $categoryTreeId, string $categoryId)
    {
        parent::__construct($client);
        $this->marketplaceId = $marketplaceId;
        $this->categoryTreeId = $categoryTreeId;
        $this->categoryId = $categoryId;
    }

    public function endpoint(): string
    {
        return '/sell/metadata/v1/compatibilities/get_compatibility_property_names';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function headers(): array
    {
        return array_merge(parent::headers(), [
            'X-EBAY-C-MARKETPLACE-ID' => $this->marketplaceId->value,
        ]);
    }

    public function body(): array
    {
        return [
            'category_tree_id' => $this->categoryTreeId,
            'category_id' => $this->categoryId,
        ];
    }
}
