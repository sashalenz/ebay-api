<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\ReturnPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Account\ReturnPolicyData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Return Policy Request
 *
 * Retrieves the return policy associated with the specified return policy ID.
 */
class GetReturnPolicyRequest extends Request
{
    protected string $returnPolicyId;

    public function __construct(?EbayClient $client, string $returnPolicyId)
    {
        parent::__construct($client);
        $this->returnPolicyId = $returnPolicyId;
    }

    public function endpoint(): string
    {
        return "/sell/account/v1/return_policy/{$this->returnPolicyId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return ReturnPolicyData::class;
    }
}
