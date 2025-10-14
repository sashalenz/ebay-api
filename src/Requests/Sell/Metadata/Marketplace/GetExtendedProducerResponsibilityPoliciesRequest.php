<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Metadata\Marketplace;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Extended Producer Responsibility Policies Request
 *
 * Retrieves all eBay categories that support/require Extended Producer Responsibility data.
 */
class GetExtendedProducerResponsibilityPoliciesRequest extends Request
{
    protected MarketplaceId $marketplaceId;

    protected ?string $filter = null;

    public function __construct(?EbayClient $client, MarketplaceId $marketplaceId)
    {
        parent::__construct($client);
        $this->marketplaceId = $marketplaceId;
    }

    public function filter(string $filter): self
    {
        $this->filter = $filter;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/metadata/v1/marketplace/{$this->marketplaceId->value}/get_extended_producer_responsibility_policies";
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->filter !== null) {
            $query['filter'] = $this->filter;
        }

        return $query;
    }
}
