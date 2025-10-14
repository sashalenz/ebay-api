<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Notification\Destination;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Notification\DestinationsData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Destinations Request
 *
 * Retrieves the details of all destination endpoints set up by a user.
 */
class GetDestinationsRequest extends Request
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
        return '/sell/notification/v1/destination';
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
        return DestinationsData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'destinations';
    }
}
