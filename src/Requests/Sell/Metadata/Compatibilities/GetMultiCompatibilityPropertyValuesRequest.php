<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Metadata\Compatibilities;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Multi Compatibility Property Values Request
 *
 * Retrieves product compatibility property values associated with the specified property names.
 */
class GetMultiCompatibilityPropertyValuesRequest extends Request
{
    protected MarketplaceId $marketplaceId;

    protected string $categoryTreeId;

    protected string $categoryId;

    protected array $compatibilityProperties;

    public function __construct(?EbayClient $client, MarketplaceId $marketplaceId, string $categoryTreeId, string $categoryId, array $compatibilityProperties)
    {
        parent::__construct($client);
        $this->marketplaceId = $marketplaceId;
        $this->categoryTreeId = $categoryTreeId;
        $this->categoryId = $categoryId;
        $this->compatibilityProperties = $compatibilityProperties;
    }

    public function endpoint(): string
    {
        return '/sell/metadata/v1/compatibilities/get_multi_compatibility_property_values';
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
            'compatibility_properties' => $this->compatibilityProperties,
        ];
    }
}
