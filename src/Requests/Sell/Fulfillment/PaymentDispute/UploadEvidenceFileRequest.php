<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Fulfillment\PaymentDispute;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Upload Evidence File Request
 *
 * Uploads an evidence file for a contested payment dispute.
 */
class UploadEvidenceFileRequest extends Request
{
    protected string $paymentDisputeId;

    protected string $filePath;

    public function __construct(?EbayClient $client, string $paymentDisputeId, string $filePath)
    {
        parent::__construct($client);
        $this->paymentDisputeId = $paymentDisputeId;
        $this->filePath = $filePath;
    }

    public function endpoint(): string
    {
        return "/sell/fulfillment/v1/payment_dispute/{$this->paymentDisputeId}/upload_evidence_file";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return [
            'file' => $this->filePath,
        ];
    }
}
