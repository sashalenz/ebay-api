<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Metadata\Compatibilities;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Compatibilities By Specification Request
 *
 * Retrieves all compatible applications for a part based on the provided specifications.
 */
class GetCompatibilitiesBySpecificationRequest extends Request
{
    protected MarketplaceId $marketplaceId;

    protected string $categoryTreeId;

    protected array $compatibilityProperties;

    public function __construct(?EbayClient $client, MarketplaceId $marketplaceId, string $categoryTreeId, array $compatibilityProperties)
    {
        parent::__construct($client);
        $this->marketplaceId = $marketplaceId;
        $this->categoryTreeId = $categoryTreeId;
        $this->compatibilityProperties = $compatibilityProperties;
    }

    public function endpoint(): string
    {
        return '/sell/metadata/v1/compatibilities/get_compatibilities_by_specification';
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
            'compatibility_properties' => $this->compatibilityProperties,
        ];
    }
}
