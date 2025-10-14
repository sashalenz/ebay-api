<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\ReturnPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Delete Return Policy Request
 *
 * Deletes a return policy from the associated seller account.
 */
class DeleteReturnPolicyRequest extends Request
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
        return 'DELETE';
    }
}
