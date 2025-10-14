<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Fulfillment\PaymentDispute;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Contest Payment Dispute Request
 *
 * Contests a payment dispute.
 */
class ContestPaymentDisputeRequest extends Request
{
    protected string $paymentDisputeId;

    protected ?string $returnAddress = null;

    protected ?string $revision = null;

    public function __construct(?EbayClient $client, string $paymentDisputeId)
    {
        parent::__construct($client);
        $this->paymentDisputeId = $paymentDisputeId;
    }

    public function returnAddress(string $returnAddress): self
    {
        $this->returnAddress = $returnAddress;

        return $this;
    }

    public function revision(string $revision): self
    {
        $this->revision = $revision;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/fulfillment/v1/payment_dispute/{$this->paymentDisputeId}/contest";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        $body = [];

        if ($this->returnAddress !== null) {
            $body['returnAddress'] = $this->returnAddress;
        }

        if ($this->revision !== null) {
            $body['revision'] = $this->revision;
        }

        return $body;
    }
}
