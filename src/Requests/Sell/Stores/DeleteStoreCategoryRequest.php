<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Stores;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Delete Store Category Request
 *
 * Deletes a custom category from a user's eBay store.
 *
 * @see https://developer.ebay.com/api-docs/sell/stores/resources/store/methods/deleteStoreCategory
 */
class DeleteStoreCategoryRequest extends Request
{
    protected string $categoryId;

    protected ?string $listingDestinationCategoryId = null;

    public function __construct(?EbayClient $client, string $categoryId)
    {
        parent::__construct($client);
        $this->categoryId = $categoryId;
    }

    /**
     * Set the category ID where listings should be moved
     */
    public function listingDestinationCategoryId(string $listingDestinationCategoryId): self
    {
        $this->listingDestinationCategoryId = $listingDestinationCategoryId;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/stores/v1/store/categories/'.$this->categoryId;
    }

    public function method(): string
    {
        return 'DELETE';
    }

    public function query(): array
    {
        $query = [];

        if ($this->listingDestinationCategoryId !== null) {
            $query['listing_destination_category_id'] = $this->listingDestinationCategoryId;
        }

        return $query;
    }
}
