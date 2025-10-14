<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\ReturnPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Return Policy Request
 *
 * Updates the return policy associated with the specified return policy ID.
 */
class UpdateReturnPolicyRequest extends Request
{
    protected string $returnPolicyId;

    protected array $data = [];

    public function __construct(?EbayClient $client, string $returnPolicyId)
    {
        parent::__construct($client);
        $this->returnPolicyId = $returnPolicyId;
    }

    public function data(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/account/v1/return_policy/{$this->returnPolicyId}";
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
