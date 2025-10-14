<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Notification\Topic;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Notification\TopicsData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Topics Request
 *
 * Retrieves details of all available notification topics.
 */
class GetTopicsRequest extends Request
{
    protected ?int $limit = null;

    protected ?string $continuationToken = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function limit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    public function continuationToken(string $continuationToken): self
    {
        $this->continuationToken = $continuationToken;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/notification/v1/topic';
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

        if ($this->continuationToken !== null) {
            $query['continuation_token'] = $this->continuationToken;
        }

        return $query;
    }

    protected function dto(): ?string
    {
        return TopicsData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'topics';
    }
}
