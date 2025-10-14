<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Stores;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Add Store Category Request
 *
 * Adds a single new custom category to a user's eBay store through an asynchronous request.
 * Returns the getStoreTask URI in the Location response header.
 *
 * @see https://developer.ebay.com/api-docs/sell/stores/resources/store/methods/addStoreCategory
 */
class AddStoreCategoryRequest extends Request
{
    protected string $categoryName;

    protected ?string $destinationParentCategoryId = null;

    protected ?string $listingDestinationCategoryId = null;

    /**
     * Create a new Add Store Category request
     *
     * @param  EbayClient|null  $client  The eBay API client (auto-resolved if null)
     * @param  string  $categoryName  The seller-specified name (max 35 chars)
     */
    public function __construct(?EbayClient $client, string $categoryName)
    {
        parent::__construct($client);
        $this->categoryName = $categoryName;
    }

    /**
     * Set the parent category ID
     * Use -999 or omit for top-level category
     */
    public function destinationParentCategoryId(string $destinationParentCategoryId): self
    {
        $this->destinationParentCategoryId = $destinationParentCategoryId;

        return $this;
    }

    /**
     * Set the listing destination category ID
     * If parent category has active listings, they will be moved here
     */
    public function listingDestinationCategoryId(string $listingDestinationCategoryId): self
    {
        $this->listingDestinationCategoryId = $listingDestinationCategoryId;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/stores/v1/store/categories';
    }

    public function method(): string
    {
        return 'POST';
    }

    protected function validate(): array
    {
        $errors = [];

        if (empty($this->categoryName)) {
            $errors[] = 'Category name is required';
        }

        if (strlen($this->categoryName) > 35) {
            $errors[] = 'Category name cannot exceed 35 characters';
        }

        return $errors;
    }

    public function body(): array
    {
        $body = [
            'categoryName' => $this->categoryName,
        ];

        if ($this->destinationParentCategoryId !== null) {
            $body['destinationParentCategoryId'] = $this->destinationParentCategoryId;
        }

        if ($this->listingDestinationCategoryId !== null) {
            $body['listingDestinationCategoryId'] = $this->listingDestinationCategoryId;
        }

        return $body;
    }
}
