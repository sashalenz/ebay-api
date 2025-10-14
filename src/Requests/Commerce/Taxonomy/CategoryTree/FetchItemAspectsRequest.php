<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Commerce\Taxonomy\CategoryTree;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Commerce\Taxonomy\GetCategoriesAspectData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Fetch Item Aspects Request
 *
 * Returns a complete list of aspects for all leaf categories in an eBay marketplace.
 * Response is a gzipped JSON file.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/resources/category_tree/methods/fetchItemAspects
 */
class FetchItemAspectsRequest extends Request
{
    protected string $categoryTreeId;

    /**
     * Create a new Fetch Item Aspects request
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
        return '/commerce/taxonomy/v1/category_tree/'.$this->categoryTreeId.'/fetch_item_aspects';
    }

    /**
     * Get the HTTP method for this request
     */
    public function method(): string
    {
        return 'GET';
    }

    /**
     * Get additional headers for this request
     *
     * Request gzip compression for the large response
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
     * @return class-string<GetCategoriesAspectData>
     */
    public function dto(): string
    {
        return GetCategoriesAspectData::class;
    }
}
