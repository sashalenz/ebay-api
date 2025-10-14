<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\CustomPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Account\CustomPolicyData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Custom Policy Request
 *
 * Retrieves a custom policy identified by policy ID.
 */
class GetCustomPolicyRequest extends Request
{
    protected string $customPolicyId;

    public function __construct(?EbayClient $client, string $customPolicyId)
    {
        parent::__construct($client);
        $this->customPolicyId = $customPolicyId;
    }

    public function endpoint(): string
    {
        return "/sell/account/v1/custom_policy/{$this->customPolicyId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return CustomPolicyData::class;
    }
}
