<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\PaymentPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Account\PaymentPolicyData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Payment Policy Request
 *
 * Retrieves the payment policy associated with the specified payment policy ID.
 */
class GetPaymentPolicyRequest extends Request
{
    protected string $paymentPolicyId;

    public function __construct(?EbayClient $client, string $paymentPolicyId)
    {
        parent::__construct($client);
        $this->paymentPolicyId = $paymentPolicyId;
    }

    public function endpoint(): string
    {
        return "/sell/account/v1/payment_policy/{$this->paymentPolicyId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return PaymentPolicyData::class;
    }
}
