<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Recommendation\ListingRecommendation;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Recommendation\PagedListingRecommendationCollectionData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Find Listing Recommendations Request
 *
 * Provides recommendations and suggested bid rates for Promoted Listings ad campaigns.
 */
class FindListingRecommendationsRequest extends Request
{
    protected ?array $filter = null;

    protected ?int $limit = null;

    protected ?int $offset = null;

    protected ?string $sort = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function filter(array $filter): self
    {
        $this->filter = $filter;

        return $this;
    }

    public function limit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    public function offset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    public function sort(string $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/recommendation/v1/find';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        $body = [];

        if ($this->filter !== null) {
            $body['filter'] = $this->filter;
        }

        if ($this->limit !== null) {
            $body['limit'] = $this->limit;
        }

        if ($this->offset !== null) {
            $body['offset'] = $this->offset;
        }

        if ($this->sort !== null) {
            $body['sort'] = $this->sort;
        }

        return $body;
    }

    protected function dto(): ?string
    {
        return PagedListingRecommendationCollectionData::class;
    }
}
