<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Commerce\Taxonomy\CategoryTree;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Commerce\Taxonomy\AspectMetadataData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Item Aspects For Category Request
 *
 * Returns a list of aspects appropriate for accurately describing items in a specified leaf category.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/resources/category_tree/methods/getItemAspectsForCategory
 */
class GetItemAspectsForCategoryRequest extends Request
{
    protected string $categoryTreeId;

    protected string $categoryId;

    /**
     * Create a new Get Item Aspects For Category request
     *
     * @param  EbayClient|null  $client  The eBay API client (auto-resolved if null)
     * @param  string  $categoryTreeId  The category tree ID (e.g., '0' for US)
     * @param  string  $categoryId  The leaf category ID
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
        return '/commerce/taxonomy/v1/category_tree/'.$this->categoryTreeId.'/get_item_aspects_for_category';
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
     * Get the Data class for automatic response mapping
     *
     * @return class-string<AspectMetadataData>
     */
    public function dto(): string
    {
        return AspectMetadataData::class;
    }
}
