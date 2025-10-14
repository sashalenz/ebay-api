<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Submit Return File Request
 *
 * Activate the files associated with a return request.
 * Call this after uploading files via UploadReturnFileRequest.
 */
class SubmitReturnFileRequest extends Request
{
    protected string $method = 'POST';

    protected array $payload = [];

    public function __construct(
        protected string $returnId,
    ) {}

    public static function make(string $returnId): static
    {
        return new static($returnId);
    }

    public function resolveEndpoint(): string
    {
        return "/post-order/v2/return/{$this->returnId}/file/submit";
    }

    public function fileIds(array $fileIds): static
    {
        $this->payload['fileIds'] = $fileIds;

        return $this;
    }

    public function defaultBody(): array
    {
        return $this->payload;
    }
}
