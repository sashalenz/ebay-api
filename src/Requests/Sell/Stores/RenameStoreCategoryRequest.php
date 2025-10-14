<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Stores;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Rename Store Category Request
 *
 * Renames a custom category in a user's eBay store.
 *
 * @see https://developer.ebay.com/api-docs/sell/stores/resources/store/methods/renameStoreCategory
 */
class RenameStoreCategoryRequest extends Request
{
    protected string $categoryId;

    protected string $categoryName;

    public function __construct(?EbayClient $client, string $categoryId, string $categoryName)
    {
        parent::__construct($client);
        $this->categoryId = $categoryId;
        $this->categoryName = $categoryName;
    }

    public function endpoint(): string
    {
        return '/sell/stores/v1/store/categories/'.$this->categoryId.'/rename';
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
        return [
            'categoryName' => $this->categoryName,
        ];
    }
}
