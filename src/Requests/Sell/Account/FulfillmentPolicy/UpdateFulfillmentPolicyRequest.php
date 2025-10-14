<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\FulfillmentPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Fulfillment Policy Request
 *
 * Updates the fulfillment policy associated with the specified fulfillment policy ID.
 */
class UpdateFulfillmentPolicyRequest extends Request
{
    protected string $fulfillmentPolicyId;

    protected array $data = [];

    public function __construct(?EbayClient $client, string $fulfillmentPolicyId)
    {
        parent::__construct($client);
        $this->fulfillmentPolicyId = $fulfillmentPolicyId;
    }

    public function data(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/account/v1/fulfillment_policy/{$this->fulfillmentPolicyId}";
    }

    public function method(): string
    {
        return 'PUT';
    }

    public function body(): array
    {
        return $this->data;
    }
}
