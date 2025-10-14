<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Offer;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Bulk Publish Offer Request
 *
 * Publishes multiple offers (max 25).
 */
class BulkPublishOfferRequest extends Request
{
    /** @var array<string> */
    protected array $offerIds = [];

    public function __construct(?EbayClient $client)
    {
        parent::__construct($client);
    }

    /**
     * Add an offer ID to publish
     */
    public function addOfferId(string $offerId): self
    {
        $this->offerIds[] = $offerId;

        return $this;
    }

    /**
     * Set offer IDs to publish
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

        if (count($this->offerIds) > 25) {
            $errors[] = 'Maximum 25 offers allowed per request';
        }

        return $errors;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/bulk_publish_offer';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return [
            'requests' => array_map(fn ($id) => ['offerId' => $id], $this->offerIds),
        ];
    }
}
