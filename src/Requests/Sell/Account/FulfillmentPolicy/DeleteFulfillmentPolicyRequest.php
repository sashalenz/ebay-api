<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\FulfillmentPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Delete Fulfillment Policy Request
 *
 * Deletes a fulfillment policy from the associated seller account.
 */
class DeleteFulfillmentPolicyRequest extends Request
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
        return 'DELETE';
    }
}
