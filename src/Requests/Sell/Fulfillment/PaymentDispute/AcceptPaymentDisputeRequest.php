<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Fulfillment\PaymentDispute;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Accept Payment Dispute Request
 *
 * Accepts a payment dispute.
 */
class AcceptPaymentDisputeRequest extends Request
{
    protected string $paymentDisputeId;

    protected ?string $revision = null;

    public function __construct(?EbayClient $client, string $paymentDisputeId)
    {
        parent::__construct($client);
        $this->paymentDisputeId = $paymentDisputeId;
    }

    public function revision(string $revision): self
    {
        $this->revision = $revision;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/fulfillment/v1/payment_dispute/{$this->paymentDisputeId}/accept";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        $body = [];

        if ($this->revision !== null) {
            $body['revision'] = $this->revision;
        }

        return $body;
    }
}
