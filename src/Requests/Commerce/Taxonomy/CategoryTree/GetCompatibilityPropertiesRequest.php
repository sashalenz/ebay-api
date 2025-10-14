<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Commerce\Taxonomy\CategoryTree;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Commerce\Taxonomy\GetCompatibilityMetadataData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Compatibility Properties Request
 *
 * Retrieves compatible vehicle aspects for motor vehicle parts/accessories categories.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/resources/category_tree/methods/getCompatibilityProperties
 */
class GetCompatibilityPropertiesRequest extends Request
{
    protected string $categoryTreeId;

    protected string $categoryId;

    /**
     * Create a new Get Compatibility Properties request
     *
     * @param  EbayClient|null  $client  The eBay API client (auto-resolved if null)
     * @param  string  $categoryTreeId  The category tree ID (0=US, 100=Motors US, 2=CA, 3=UK, 77=DE, 15=AU, 71=FR, 101=IT, 186=ES)
     * @param  string  $categoryId  The category ID that supports parts compatibility
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
        return '/commerce/taxonomy/v1/category_tree/'.$this->categoryTreeId.'/get_compatibility_properties';
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
     * @return class-string<GetCompatibilityMetadataData>
     */
    public function dto(): string
    {
        return GetCompatibilityMetadataData::class;
    }
}
