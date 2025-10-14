<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Offer;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Inventory\ListingFeesData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Listing Fees Request
 *
 * Retrieves listing fees for unpublished offers.
 */
class GetListingFeesRequest extends Request
{
    /** @var array<string> */
    protected array $offerIds = [];

    public function __construct(?EbayClient $client)
    {
        parent::__construct($client);
    }

    /**
     * Add an offer ID
     */
    public function addOfferId(string $offerId): self
    {
        $this->offerIds[] = $offerId;

        return $this;
    }

    /**
     * Set offer IDs
     *
     * @param  array<string>  $offerIds
     */
    public function offerIds(array $offerIds): self
    {
        $this->offerIds = $offerIds;

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

        if (empty($this->offerIds)) {
            $errors[] = 'At least one offer ID is required';
        }

        return $errors;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/offer/get_listing_fees';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return [
            'offers' => array_map(fn ($id) => ['offerId' => $id], $this->offerIds),
        ];
    }

    protected function dto(): ?string
    {
        return ListingFeesData::class;
    }
}
