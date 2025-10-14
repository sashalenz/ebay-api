<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Commerce\Catalog;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Commerce\Catalog\ProductSearchResponseData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Search Products Request
 *
 * Retrieves one or more eBay catalog products based on search filters.
 */
class SearchProductsRequest extends Request
{
    protected ?string $q = null;

    protected ?string $gtin = null;

    protected ?string $mpn = null;

    protected ?string $brand = null;

    protected ?string $epid = null;

    protected ?string $categoryId = null;

    protected ?string $aspect_filter = null;

    protected ?int $limit = null;

    protected ?int $offset = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    /**
     * Set the query string (general search term)
     */
    public function query(string $q): self
    {
        $this->q = $q;

        return $this;
    }

    /**
     * Set the GTIN (UPC, EAN, ISBN)
     */
    public function gtin(string $gtin): self
    {
        $this->gtin = $gtin;

        return $this;
    }

    /**
     * Set the manufacturer part number
     */
    public function mpn(string $mpn): self
    {
        $this->mpn = $mpn;

        return $this;
    }

    /**
     * Set the brand name
     */
    public function brand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Set the eBay product ID to search for
     */
    public function epid(string $epid): self
    {
        $this->epid = $epid;

        return $this;
    }

    /**
     * Set the category ID filter
     */
    public function categoryId(string $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Set aspect filter (format: aspect_filter=localizedName:value)
     */
    public function aspectFilter(string $aspectFilter): self
    {
        $this->aspect_filter = $aspectFilter;

        return $this;
    }

    /**
     * Set the number of results to return
     */
    public function limit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * Set the number of results to skip
     */
    public function offset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/catalog/v1_beta/product_summary/search';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->q !== null) {
            $query['q'] = $this->q;
        }

        if ($this->gtin !== null) {
            $query['gtin'] = $this->gtin;
        }

        if ($this->mpn !== null) {
            $query['mpn'] = $this->mpn;
        }

        if ($this->brand !== null) {
            $query['brand'] = $this->brand;
        }

        if ($this->epid !== null) {
            $query['epid'] = $this->epid;
        }

        if ($this->categoryId !== null) {
            $query['category_id'] = $this->categoryId;
        }

        if ($this->aspect_filter !== null) {
            $query['aspect_filter'] = $this->aspect_filter;
        }

        if ($this->limit !== null) {
            $query['limit'] = $this->limit;
        }

        if ($this->offset !== null) {
            $query['offset'] = $this->offset;
        }

        return $query;
    }

    protected function dto(): ?string
    {
        return ProductSearchResponseData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'productSummaries';
    }
}
