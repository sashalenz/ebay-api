<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Stores;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Move Store Category Request
 *
 * Moves a store category to a different position in the store category hierarchy.
 *
 * @see https://developer.ebay.com/api-docs/sell/stores/resources/store/methods/moveStoreCategory
 */
class MoveStoreCategoryRequest extends Request
{
    protected string $categoryId;

    protected ?string $destinationParentCategoryId = null;

    protected ?string $listingDestinationCategoryId = null;

    public function __construct(?EbayClient $client, string $categoryId)
    {
        parent::__construct($client);
        $this->categoryId = $categoryId;
    }

    public function destinationParentCategoryId(string $destinationParentCategoryId): self
    {
        $this->destinationParentCategoryId = $destinationParentCategoryId;

        return $this;
    }

    public function listingDestinationCategoryId(string $listingDestinationCategoryId): self
    {
        $this->listingDestinationCategoryId = $listingDestinationCategoryId;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/stores/v1/store/categories/'.$this->categoryId.'/move';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        $body = [];

        if ($this->destinationParentCategoryId !== null) {
            $body['destinationParentCategoryId'] = $this->destinationParentCategoryId;
        }

        if ($this->listingDestinationCategoryId !== null) {
            $body['listingDestinationCategoryId'] = $this->listingDestinationCategoryId;
        }

        return $body;
    }
}
