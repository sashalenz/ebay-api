<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\FulfillmentPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Account\FulfillmentPolicyData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Fulfillment Policy Request
 *
 * Retrieves the fulfillment policy associated with the specified fulfillment policy ID.
 */
class GetFulfillmentPolicyRequest extends Request
{
    protected string $fulfillmentPolicyId;

    public function __construct(?EbayClient $client, string $fulfillmentPolicyId)
    {
        parent::__construct($client);
        $this->fulfillmentPolicyId = $fulfillmentPolicyId;
    }

    public function endpoint(): string
    {
        return "/sell/account/v1/fulfillment_policy/{$this->fulfillmentPolicyId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return FulfillmentPolicyData::class;
    }
}
