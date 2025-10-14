<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\CustomPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Account\CustomPolicyData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Custom Policy Request
 *
 * Creates a custom Product Compliance or Takeback policy for the associated seller account.
 */
class CreateCustomPolicyRequest extends Request
{
    protected string $label;

    protected string $description;

    protected string $policyType;

    public function __construct(?EbayClient $client, string $label, string $description, string $policyType)
    {
        parent::__construct($client);
        $this->label = $label;
        $this->description = $description;
        $this->policyType = $policyType;
    }

    public function endpoint(): string
    {
        return '/sell/account/v1/custom_policy';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return [
            'label' => $this->label,
            'description' => $this->description,
            'policyType' => $this->policyType,
        ];
    }

    protected function dto(): ?string
    {
        return CustomPolicyData::class;
    }
}
