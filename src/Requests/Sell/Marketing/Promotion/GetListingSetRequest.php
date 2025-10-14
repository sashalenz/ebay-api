<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Promotion;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Listing Set Request
 *
 * Retrieves listings associated with a promotion.
 */
class GetListingSetRequest extends Request
{
    protected string $promotionId;

    protected ?int $limit = null;

    protected ?int $offset = null;

    protected ?string $q = null;

    public function __construct(?EbayClient $client, string $promotionId)
    {
        parent::__construct($client);
        $this->promotionId = $promotionId;
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

    public function q(string $q): self
    {
        $this->q = $q;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/promotion/{$this->promotionId}/get_listing_set";
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->limit !== null) {
            $query['limit'] = $this->limit;
        }

        if ($this->offset !== null) {
            $query['offset'] = $this->offset;
        }

        if ($this->q !== null) {
            $query['q'] = $this->q;
        }

        return $query;
    }
}
