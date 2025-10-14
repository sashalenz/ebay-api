<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\FulfillmentPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Account\FulfillmentPolicyData;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Fulfillment Policy By Name Request
 *
 * Retrieves the fulfillment policy associated with the specified fulfillment policy name.
 */
class GetFulfillmentPolicyByNameRequest extends Request
{
    protected MarketplaceId $marketplaceId;

    protected string $name;

    public function __construct(?EbayClient $client, MarketplaceId $marketplaceId, string $name)
    {
        parent::__construct($client);
        $this->marketplaceId = $marketplaceId;
        $this->name = $name;
    }

    public function endpoint(): string
    {
        return '/sell/account/v1/fulfillment_policy/get_by_policy_name';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        return [
            'marketplace_id' => $this->marketplaceId->value,
            'name' => $this->name,
        ];
    }

    protected function dto(): ?string
    {
        return FulfillmentPolicyData::class;
    }
}
