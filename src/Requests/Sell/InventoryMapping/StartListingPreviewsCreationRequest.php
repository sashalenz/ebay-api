<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\InventoryMapping;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Start Listing Previews Creation Request
 *
 * GraphQL mutation to create listing previews from product data using AI.
 *
 * @see https://developer.ebay.com/develop/api/sell/inventory_mapping/mutation/startlistingpreviewscreation
 */
class StartListingPreviewsCreationRequest extends Request
{
    protected array $products = [];

    protected MarketplaceId $marketplaceId = MarketplaceId::EBAY_US;

    public function __construct(?EbayClient $client)
    {
        parent::__construct($client);
    }

    public function addProduct(array $product): self
    {
        $this->products[] = $product;

        return $this;
    }

    public function products(array $products): self
    {
        $this->products = $products;

        return $this;
    }

    public function marketplaceId(MarketplaceId $marketplaceId): self
    {
        $this->marketplaceId = $marketplaceId;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/inventory_mapping/v1/graphql';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function headers(): array
    {
        return [
            'X-EBAY-C-MARKETPLACE-ID' => $this->marketplaceId->value,
            'Content-Type' => 'application/json',
        ];
    }

    protected function validate(): array
    {
        $errors = [];

        if (empty($this->products)) {
            $errors[] = 'At least one product is required';
        }

        return $errors;
    }

    public function body(): array
    {
        $query = <<<'GRAPHQL'
mutation startListingPreviewsCreation($products: [ProductInput!]!) {
  startListingPreviewsCreation(products: $products) {
    taskId
    status
    createdAt
  }
}
GRAPHQL;

        return [
            'query' => $query,
            'variables' => [
                'products' => $this->products,
            ],
        ];
    }
}
