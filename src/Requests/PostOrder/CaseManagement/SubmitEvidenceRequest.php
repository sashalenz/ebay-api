<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\CaseManagement;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Submit Evidence Request
 *
 * Submit evidence (documents, tracking info) to support your case position.
 */
class SubmitEvidenceRequest extends Request
{
    protected string $method = 'POST';

    protected array $payload = [];

    public function __construct(
        protected string $caseId,
    ) {}

    public static function make(string $caseId): static
    {
        return new static($caseId);
    }

    public function resolveEndpoint(): string
    {
        return "/post-order/v2/casemanagement/{$this->caseId}/submit_evidence";
    }

    /**
     * Set evidence type
     */
    public function evidenceType(string $evidenceType): static
    {
        $this->payload['evidenceType'] = $evidenceType;

        return $this;
    }

    /**
     * Set tracking number
     */
    public function trackingNumber(string $trackingNumber): static
    {
        $this->payload['trackingNumber'] = $trackingNumber;

        return $this;
    }

    /**
     * Set shipping carrier
     */
    public function shippingCarrierName(string $carrier): static
    {
        $this->payload['shippingCarrierName'] = $carrier;

        return $this;
    }

    /**
     * Set file IDs (uploaded via UploadEvidenceFile)
     */
    public function fileIds(array $fileIds): static
    {
        $this->payload['fileIds'] = $fileIds;

        return $this;
    }

    /**
     * Set evidence text/comments
     */
    public function text(string $text): static
    {
        $this->payload['text'] = $text;

        return $this;
    }

    public function defaultBody(): array
    {
        return $this->payload;
    }
}
