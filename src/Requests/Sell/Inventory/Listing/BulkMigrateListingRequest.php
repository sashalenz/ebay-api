<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Listing;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Inventory\BulkMigrateListingResponseData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Bulk Migrate Listing Request
 *
 * Migrates listings from legacy APIs to Inventory API.
 */
class BulkMigrateListingRequest extends Request
{
    /** @var array<string> */
    protected array $listingIds = [];

    public function __construct(?EbayClient $client)
    {
        parent::__construct($client);
    }

    /**
     * Add a listing ID to migrate
     */
    public function addListingId(string $listingId): self
    {
        $this->listingIds[] = $listingId;

        return $this;
    }

    /**
     * Set listing IDs to migrate
     *
     * @param  array<string>  $listingIds
     */
    public function listingIds(array $listingIds): self
    {
        $this->listingIds = $listingIds;

        return $this;
    }

    /**
     * Validate the request before sending
     *
     * @return array<string>
     */
    protected function validate(): array
    {
        $errors = [];

        if (empty($this->listingIds)) {
            $errors[] = 'At least one listing ID is required';
        }

        return $errors;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/bulk_migrate_listing';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return [
            'requests' => array_map(fn ($id) => ['listingId' => $id], $this->listingIds),
        ];
    }

    protected function dto(): ?string
    {
        return BulkMigrateListingResponseData::class;
    }
}
