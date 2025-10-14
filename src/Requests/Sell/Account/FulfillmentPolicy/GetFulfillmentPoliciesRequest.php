<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\FulfillmentPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Account\FulfillmentPoliciesData;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Fulfillment Policies Request
 *
 * Retrieves all the fulfillment policies associated with the seller's account for the specified marketplace.
 */
class GetFulfillmentPoliciesRequest extends Request
{
    protected MarketplaceId $marketplaceId;

    public function __construct(?EbayClient $client, MarketplaceId $marketplaceId)
    {
        parent::__construct($client);
        $this->marketplaceId = $marketplaceId;
    }

    public function endpoint(): string
    {
        return '/sell/account/v1/fulfillment_policy';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        return [
            'marketplace_id' => $this->marketplaceId->value,
        ];
    }

    protected function dto(): ?string
    {
        return FulfillmentPoliciesData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'fulfillmentPolicies';
    }
}
