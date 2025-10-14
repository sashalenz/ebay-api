<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Campaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Suggest Items Request
 *
 * Gets item suggestions for a campaign.
 */
class SuggestItemsRequest extends Request
{
    protected string $campaignId;

    protected ?string $categoryIds = null;

    protected ?int $limit = null;

    protected ?int $offset = null;

    public function __construct(?EbayClient $client, string $campaignId)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
    }

    public function categoryIds(string $categoryIds): self
    {
        $this->categoryIds = $categoryIds;

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

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/suggest_items";
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->categoryIds !== null) {
            $query['category_ids'] = $this->categoryIds;
        }

        if ($this->limit !== null) {
            $query['limit'] = $this->limit;
        }

        if ($this->offset !== null) {
            $query['offset'] = $this->offset;
        }

        return $query;
    }
}
