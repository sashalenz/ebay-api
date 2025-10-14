<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Fulfillment\PaymentDispute;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Add Evidence Request
 *
 * Adds an evidence file for a payment dispute.
 */
class AddEvidenceRequest extends Request
{
    protected string $paymentDisputeId;

    protected array $evidenceRequests = [];

    public function __construct(?EbayClient $client, string $paymentDisputeId)
    {
        parent::__construct($client);
        $this->paymentDisputeId = $paymentDisputeId;
    }

    public function evidenceRequests(array $evidenceRequests): self
    {
        $this->evidenceRequests = $evidenceRequests;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/fulfillment/v1/payment_dispute/{$this->paymentDisputeId}/add_evidence";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return [
            'evidenceRequests' => $this->evidenceRequests,
        ];
    }
}
