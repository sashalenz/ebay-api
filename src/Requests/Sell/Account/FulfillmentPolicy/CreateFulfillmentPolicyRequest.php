<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\FulfillmentPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Account\FulfillmentPolicyData;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Fulfillment Policy Request
 *
 * Creates a fulfillment policy for the associated seller account.
 */
class CreateFulfillmentPolicyRequest extends Request
{
    protected MarketplaceId $marketplaceId;

    protected string $name;

    protected array $data = [];

    public function __construct(?EbayClient $client, MarketplaceId $marketplaceId, string $name)
    {
        parent::__construct($client);
        $this->marketplaceId = $marketplaceId;
        $this->name = $name;
    }

    public function data(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/account/v1/fulfillment_policy';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return array_merge([
            'marketplaceId' => $this->marketplaceId->value,
            'name' => $this->name,
        ], $this->data);
    }

    protected function dto(): ?string
    {
        return FulfillmentPolicyData::class;
    }
}
