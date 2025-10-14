<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Offer;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Inventory\OfferData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Bulk Create Offer Request
 *
 * Creates multiple offers (max 25).
 */
class BulkCreateOfferRequest extends Request
{
    /** @var array<OfferData> */
    protected array $requests = [];

    public function __construct(?EbayClient $client)
    {
        parent::__construct($client);
    }

    /**
     * Add an offer to create
     */
    public function addOffer(OfferData $offer): self
    {
        $this->requests[] = $offer->toArray();

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

        if (empty($this->requests)) {
            $errors[] = 'At least one offer is required';
        }

        if (count($this->requests) > 25) {
            $errors[] = 'Maximum 25 offers allowed per request';
        }

        return $errors;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/bulk_create_offer';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return [
            'requests' => $this->requests,
        ];
    }
}
