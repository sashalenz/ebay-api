<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Charity;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Charity\CharityOrgsData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Charity Organizations Request
 *
 * Retrieves details on one or more charitable organizations based on search criteria.
 */
class GetCharityOrgsRequest extends Request
{
    protected ?string $q = null;

    protected ?string $registrationIds = null;

    protected ?int $limit = null;

    protected ?int $offset = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    /**
     * Set the search query string
     */
    public function query(string $q): self
    {
        $this->q = $q;

        return $this;
    }

    /**
     * Set registration IDs filter (comma-separated)
     */
    public function registrationIds(string $registrationIds): self
    {
        $this->registrationIds = $registrationIds;

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
        return '/sell/charity/v1/charity_org';
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

        if ($this->registrationIds !== null) {
            $query['registration_ids'] = $this->registrationIds;
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
        return CharityOrgsData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'charityOrgs';
    }
}
