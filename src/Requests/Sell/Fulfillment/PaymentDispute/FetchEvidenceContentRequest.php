<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Fulfillment\PaymentDispute;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Fetch Evidence Content Request
 *
 * Retrieves a specific evidence file for a payment dispute.
 */
class FetchEvidenceContentRequest extends Request
{
    protected string $paymentDisputeId;

    protected string $evidenceId;

    protected string $fileId;

    public function __construct(?EbayClient $client, string $paymentDisputeId, string $evidenceId, string $fileId)
    {
        parent::__construct($client);
        $this->paymentDisputeId = $paymentDisputeId;
        $this->evidenceId = $evidenceId;
        $this->fileId = $fileId;
    }

    public function endpoint(): string
    {
        return "/sell/fulfillment/v1/payment_dispute/{$this->paymentDisputeId}/fetch_evidence_content";
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        return [
            'evidence_id' => $this->evidenceId,
            'file_id' => $this->fileId,
        ];
    }
}
