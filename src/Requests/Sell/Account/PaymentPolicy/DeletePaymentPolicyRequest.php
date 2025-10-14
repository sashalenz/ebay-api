<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\PaymentPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Delete Payment Policy Request
 *
 * Deletes a payment policy from the associated seller account.
 */
class DeletePaymentPolicyRequest extends Request
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
        return 'DELETE';
    }
}
