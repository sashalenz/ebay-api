<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\PaymentPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Payment Policy Request
 *
 * Updates the payment policy associated with the specified payment policy ID.
 */
class UpdatePaymentPolicyRequest extends Request
{
    protected string $paymentPolicyId;

    protected array $data = [];

    public function __construct(?EbayClient $client, string $paymentPolicyId)
    {
        parent::__construct($client);
        $this->paymentPolicyId = $paymentPolicyId;
    }

    public function data(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/account/v1/payment_policy/{$this->paymentPolicyId}";
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
