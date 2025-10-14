<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Commerce\Taxonomy\CategoryTree;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Commerce\Taxonomy\ExpiredCategoriesData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Expired Categories Request
 *
 * Retrieves mappings of expired leaf categories to their active replacements.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/resources/category_tree/methods/getExpiredCategories
 */
class GetExpiredCategoriesRequest extends Request
{
    protected string $categoryTreeId;

    /**
     * Create a new Get Expired Categories request
     *
     * @param  EbayClient|null  $client  The eBay API client (auto-resolved if null)
     * @param  string  $categoryTreeId  The category tree ID (e.g., '0' for US)
     */
    public function __construct(?EbayClient $client, string $categoryTreeId)
    {
        parent::__construct($client);
        $this->categoryTreeId = $categoryTreeId;
    }

    /**
     * Get the API endpoint path
     */
    public function endpoint(): string
    {
        return '/commerce/taxonomy/v1/category_tree/'.$this->categoryTreeId.'/get_expired_categories';
    }

    /**
     * Get the HTTP method for this request
     */
    public function method(): string
    {
        return 'GET';
    }

    /**
     * Get the Data class for automatic response mapping
     *
     * @return class-string<ExpiredCategoriesData>
     */
    public function dto(): string
    {
        return ExpiredCategoriesData::class;
    }
}
