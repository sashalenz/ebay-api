<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Media\Document;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Upload Document Request
 *
 * Uploads the document file associated with the specified document ID.
 */
class UploadDocumentRequest extends Request
{
    protected string $documentId;

    protected string $filePath;

    public function __construct(?EbayClient $client, string $documentId, string $filePath)
    {
        parent::__construct($client);
        $this->documentId = $documentId;
        $this->filePath = $filePath;
    }

    public function endpoint(): string
    {
        return '/commerce/media/v1_beta/document/'.$this->documentId.'/upload';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function headers(): array
    {
        return [
            'Content-Type' => 'application/octet-stream',
        ];
    }

    protected function validate(): array
    {
        $errors = [];

        if (! file_exists($this->filePath)) {
            $errors[] = 'Document file does not exist: '.$this->filePath;
        }

        return $errors;
    }
}
