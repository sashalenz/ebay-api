<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Commerce\Taxonomy\CategoryTree;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Commerce\Taxonomy\CategorySuggestionData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Category Suggestions Request
 *
 * Returns an array of category tree leaf nodes in the specified category tree
 * that are considered by eBay to most closely correspond to the query string.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/resources/category_suggestion/methods/getCategorySuggestions
 */
class GetCategorySuggestionsRequest extends Request
{
    protected string $categoryTreeId;

    protected string $query;

    /**
     * Create a new Get Category Suggestions request
     *
     * @param  EbayClient|null  $client  The eBay API client (auto-resolved if null)
     * @param  string  $categoryTreeId  The category tree ID (e.g., '0' for US)
     * @param  string  $query  The search query string
     */
    public function __construct(?EbayClient $client, string $categoryTreeId, string $query)
    {
        parent::__construct($client);
        $this->categoryTreeId = $categoryTreeId;
        $this->query = $query;
    }

    /**
     * Get the API endpoint path
     */
    public function endpoint(): string
    {
        return '/commerce/taxonomy/v1/category_tree/'.$this->categoryTreeId.'/get_category_suggestions';
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
            'q' => $this->query,
        ];
    }

    /**
     * Get the Data class for automatic response mapping
     *
     * @return class-string<CategorySuggestionData>
     */
    public function dto(): string
    {
        return CategorySuggestionData::class;
    }

    /**
     * Get the key to extract from response before mapping to Data
     *
     * The API returns suggestions in a 'categorySuggestions' array
     */
    public function dtoKey(): string
    {
        return 'categorySuggestions';
    }
}
