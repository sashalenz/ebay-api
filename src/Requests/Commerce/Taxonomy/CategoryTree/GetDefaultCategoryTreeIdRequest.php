<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Commerce\Taxonomy\CategoryTree;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Commerce\Taxonomy\BaseCategoryTreeData;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Default Category Tree ID Request
 *
 * Retrieves the default category tree ID for a given eBay marketplace.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/resources/category_tree/methods/getDefaultCategoryTreeId
 */
class GetDefaultCategoryTreeIdRequest extends Request
{
    protected MarketplaceId $marketplaceId;

    /**
     * Create a new Get Default Category Tree ID request
     *
     * @param  EbayClient|null  $client  The eBay API client (auto-resolved if null)
     * @param  MarketplaceId  $marketplaceId  The eBay marketplace identifier
     */
    public function __construct(?EbayClient $client, MarketplaceId $marketplaceId)
    {
        parent::__construct($client);
        $this->marketplaceId = $marketplaceId;
    }

    /**
     * Get the API endpoint path
     */
    public function endpoint(): string
    {
        return '/commerce/taxonomy/v1/get_default_category_tree_id';
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
            'marketplace_id' => $this->marketplaceId->value,
        ];
    }

    /**
     * Get the Data class for automatic response mapping
     *
     * @return class-string<BaseCategoryTreeData>
     */
    public function dto(): string
    {
        return BaseCategoryTreeData::class;
    }
}
