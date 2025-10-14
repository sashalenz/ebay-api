<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\CustomPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Custom Policy Request
 *
 * Updates details for an existing custom policy.
 */
class UpdateCustomPolicyRequest extends Request
{
    protected string $customPolicyId;

    protected array $data = [];

    public function __construct(?EbayClient $client, string $customPolicyId)
    {
        parent::__construct($client);
        $this->customPolicyId = $customPolicyId;
    }

    public function data(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/account/v1/custom_policy/{$this->customPolicyId}";
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
