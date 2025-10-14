<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\CustomPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Account\CustomPoliciesData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Custom Policies Request
 *
 * Retrieves all custom policies associated with the specified policy type(s).
 */
class GetCustomPoliciesRequest extends Request
{
    protected ?string $policyTypes = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function policyTypes(string $policyTypes): self
    {
        $this->policyTypes = $policyTypes;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/account/v1/custom_policy';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->policyTypes !== null) {
            $query['policy_types'] = $this->policyTypes;
        }

        return $query;
    }

    protected function dto(): ?string
    {
        return CustomPoliciesData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'customPolicies';
    }
}
