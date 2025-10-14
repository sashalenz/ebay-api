<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\CaseManagement;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Upload Evidence File Request
 *
 * Upload a file (image, document) as evidence for a case.
 * Use the returned fileId in SubmitEvidenceRequest.
 */
class UploadEvidenceFileRequest extends Request
{
    protected string $method = 'POST';

    protected array $multipartData = [];

    public function __construct(
        protected string $caseId,
    ) {}

    public static function make(string $caseId): static
    {
        return new static($caseId);
    }

    public function resolveEndpoint(): string
    {
        return "/post-order/v2/casemanagement/{$this->caseId}/files/upload";
    }

    /**
     * Set file contents and name for multipart upload
     */
    public function file(string $contents, string $filename): static
    {
        $this->multipartData[] = [
            'name' => 'file',
            'contents' => $contents,
            'filename' => $filename,
        ];

        return $this;
    }

    public function defaultBody(): array
    {
        return [];
    }
}
