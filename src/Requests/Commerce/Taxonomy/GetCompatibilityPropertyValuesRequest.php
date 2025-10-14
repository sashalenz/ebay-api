<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Commerce\Taxonomy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Commerce\Taxonomy\GetCompatibilityPropertyValuesData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Compatibility Property Values Request
 *
 * Retrieves applicable compatible vehicle property values based on filters.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/resources/category_tree/methods/getCompatibilityPropertyValues
 */
class GetCompatibilityPropertyValuesRequest extends Request
{
    protected string $categoryTreeId;

    protected string $categoryId;

    protected string $compatibilityProperty;

    protected array $filters = [];

    /**
     * Create a new Get Compatibility Property Values request
     *
     * @param  EbayClient|null  $client  The eBay API client (auto-resolved if null)
     * @param  string  $categoryTreeId  The category tree ID (0=US, 100=Motors US, etc.)
     * @param  string  $categoryId  The category ID that supports parts compatibility
     * @param  string  $compatibilityProperty  The property to get values for (Make, Model, Year, Trim, Engine)
     */
    public function __construct(?EbayClient $client, string $categoryTreeId, string $categoryId, string $compatibilityProperty)
    {
        parent::__construct($client);
        $this->categoryTreeId = $categoryTreeId;
        $this->categoryId = $categoryId;
        $this->compatibilityProperty = $compatibilityProperty;
    }

    /**
     * Add a filter (e.g., Year:2018, Make:Honda)
     *
     * @param  string  $property  The property name
     * @param  string  $value  The property value
     */
    public function filter(string $property, string $value): self
    {
        $this->filters[$property] = $value;

        return $this;
    }

    /**
     * Add multiple filters at once
     *
     * @param  array<string, string>  $filters  Array of property => value pairs
     */
    public function filters(array $filters): self
    {
        $this->filters = array_merge($this->filters, $filters);

        return $this;
    }

    /**
     * Get the API endpoint path
     */
    public function endpoint(): string
    {
        return '/commerce/taxonomy/v1/category_tree/'.$this->categoryTreeId.'/get_compatibility_property_values';
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
        $query = [
            'category_id' => $this->categoryId,
            'compatibility_property' => $this->compatibilityProperty,
        ];

        if (! empty($this->filters)) {
            $filterPairs = [];
            foreach ($this->filters as $property => $value) {
                // Escape commas in values
                $escapedValue = str_replace(',', '\\,', $value);
                $filterPairs[] = $property.':'.$escapedValue;
            }

            $query['filter'] = implode(',', $filterPairs);
        }

        return $query;
    }

    /**
     * Get the Data class for automatic response mapping
     *
     * @return class-string<GetCompatibilityPropertyValuesData>
     */
    public function dto(): string
    {
        return GetCompatibilityPropertyValuesData::class;
    }
}
