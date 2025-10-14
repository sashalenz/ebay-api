<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Metadata\Compatibilities;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Product Compatibilities Request
 *
 * Retrieves all available item compatibility details for the specified product.
 */
class GetProductCompatibilitiesRequest extends Request
{
    protected MarketplaceId $marketplaceId;

    protected string $categoryTreeId;

    protected string $gtin;

    protected ?string $gtinType = null;

    public function __construct(?EbayClient $client, MarketplaceId $marketplaceId, string $categoryTreeId, string $gtin)
    {
        parent::__construct($client);
        $this->marketplaceId = $marketplaceId;
        $this->categoryTreeId = $categoryTreeId;
        $this->gtin = $gtin;
    }

    public function gtinType(string $gtinType): self
    {
        $this->gtinType = $gtinType;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/metadata/v1/compatibilities/get_product_compatibilities';
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
        $body = [
            'category_tree_id' => $this->categoryTreeId,
            'gtin' => $this->gtin,
        ];

        if ($this->gtinType !== null) {
            $body['gtin_type'] = $this->gtinType;
        }

        return $body;
    }
}
