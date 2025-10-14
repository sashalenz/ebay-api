<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Fulfillment\PaymentDispute;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Fulfillment\PaymentDisputeData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Payment Dispute Request
 *
 * Retrieves full details on a specific payment dispute.
 */
class GetPaymentDisputeRequest extends Request
{
    protected string $paymentDisputeId;

    public function __construct(?EbayClient $client, string $paymentDisputeId)
    {
        parent::__construct($client);
        $this->paymentDisputeId = $paymentDisputeId;
    }

    public function endpoint(): string
    {
        return "/sell/fulfillment/v1/payment_dispute/{$this->paymentDisputeId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return PaymentDisputeData::class;
    }
}
