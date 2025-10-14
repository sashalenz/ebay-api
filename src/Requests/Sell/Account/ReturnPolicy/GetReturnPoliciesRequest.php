<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\ReturnPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Account\ReturnPoliciesData;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Return Policies Request
 *
 * Retrieves all the return policies associated with the seller's account for the the specified marketplace.
 */
class GetReturnPoliciesRequest extends Request
{
    protected MarketplaceId $marketplaceId;

    public function __construct(?EbayClient $client, MarketplaceId $marketplaceId)
    {
        parent::__construct($client);
        $this->marketplaceId = $marketplaceId;
    }

    public function endpoint(): string
    {
        return '/sell/account/v1/return_policy';
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
        return ReturnPoliciesData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'returnPolicies';
    }
}
