<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\InventoryMapping;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Listing Previews Creation Task Request
 *
 * GraphQL query to retrieve the status of a listing preview creation task.
 *
 * @see https://developer.ebay.com/develop/api/sell/inventory_mapping/mutation/startlistingpreviewscreation
 */
class GetListingPreviewsCreationTaskRequest extends Request
{
    protected string $taskId;

    protected MarketplaceId $marketplaceId = MarketplaceId::EBAY_US;

    public function __construct(?EbayClient $client, string $taskId)
    {
        parent::__construct($client);
        $this->taskId = $taskId;
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

    public function body(): array
    {
        $query = <<<'GRAPHQL'
query listingPreviewsCreationTaskById($taskId: ID!) {
  listingPreviewsCreationTaskById(taskId: $taskId) {
    taskId
    status
    createdAt
    completedAt
    products {
      productId
      listingPreview {
        title
        description
        categoryId
        aspects
        mappingReferenceID
      }
      errors {
        message
        code
      }
    }
  }
}
GRAPHQL;

        return [
            'query' => $query,
            'variables' => [
                'taskId' => $this->taskId,
            ],
        ];
    }
}
