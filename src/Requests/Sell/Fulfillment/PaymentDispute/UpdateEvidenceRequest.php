<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Fulfillment\PaymentDispute;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Evidence Request
 *
 * Updates an evidence set for a contested payment dispute.
 */
class UpdateEvidenceRequest extends Request
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
        return "/sell/fulfillment/v1/payment_dispute/{$this->paymentDisputeId}/update_evidence";
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
