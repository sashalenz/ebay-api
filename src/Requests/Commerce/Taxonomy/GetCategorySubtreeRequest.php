<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Commerce\Taxonomy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Commerce\Taxonomy\CategorySubtreeData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Category Subtree Request
 *
 * Retrieves the subtree below a specified category of a category tree.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/resources/category_tree/methods/getCategorySubtree
 */
class GetCategorySubtreeRequest extends Request
{
    protected string $categoryTreeId;

    protected string $categoryId;

    /**
     * Create a new Get Category Subtree request
     *
     * @param  EbayClient|null  $client  The eBay API client (auto-resolved if null)
     * @param  string  $categoryTreeId  The category tree ID (e.g., '0' for US)
     * @param  string  $categoryId  The category ID at the top of the subtree
     */
    public function __construct(?EbayClient $client, string $categoryTreeId, string $categoryId)
    {
        parent::__construct($client);
        $this->categoryTreeId = $categoryTreeId;
        $this->categoryId = $categoryId;
    }

    /**
     * Get the API endpoint path
     */
    public function endpoint(): string
    {
        return '/commerce/taxonomy/v1/category_tree/'.$this->categoryTreeId.'/get_category_subtree';
    }

    /**
     * Get the HTTP method for this request
     */
    public function method(): string
    {
        return 'GET';
    }

    /**
     * Get query parameters for the request
     */
    public function query(): array
    {
        return [
            'category_id' => $this->categoryId,
        ];
    }

    /**
     * Get additional headers for this request
     */
    public function headers(): array
    {
        return [
            'Accept-Encoding' => 'gzip',
        ];
    }

    /**
     * Get the Data class for automatic response mapping
     *
     * @return class-string<CategorySubtreeData>
     */
    public function dto(): string
    {
        return CategorySubtreeData::class;
    }
}
