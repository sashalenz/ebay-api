<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Data\PostOrder\Return\ReturnFileData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Upload Return File Request
 *
 * Upload files (photos, documents) relating to a return request.
 * Returns fileId that should be used in SubmitReturnFileRequest.
 */
class UploadReturnFileRequest extends Request
{
    protected string $method = 'POST';

    protected ?string $dataClass = ReturnFileData::class;

    protected array $multipartData = [];

    public function __construct(
        protected string $returnId,
    ) {}

    public static function make(string $returnId): static
    {
        return new static($returnId);
    }

    public function resolveEndpoint(): string
    {
        return "/post-order/v2/return/{$this->returnId}/file/upload";
    }

    public function file(string $contents, string $filename): static
    {
        $this->multipartData[] = [
            'name' => 'file',
            'contents' => $contents,
            'filename' => $filename,
        ];

        return $this;
    }

    public function filePurpose(string $purpose): static
    {
        $this->multipartData[] = [
            'name' => 'filePurpose',
            'contents' => $purpose,
        ];

        return $this;
    }

    public function defaultBody(): array
    {
        return [];
    }
}
