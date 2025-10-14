<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Media\Document;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Document From URL Request
 *
 * Downloads a document from the provided URL and adds it to the user's account.
 */
class CreateDocumentFromUrlRequest extends Request
{
    protected string $documentUrl;

    protected ?array $languages = null;

    protected ?array $purposes = null;

    public function __construct(?EbayClient $client, string $documentUrl)
    {
        parent::__construct($client);
        $this->documentUrl = $documentUrl;
    }

    public function languages(array $languages): self
    {
        $this->languages = $languages;

        return $this;
    }

    public function purposes(array $purposes): self
    {
        $this->purposes = $purposes;

        return $this;
    }

    public function endpoint(): string
    {
        return '/commerce/media/v1_beta/document/create_document_from_url';
    }

    public function method(): string
    {
        return 'POST';
    }

    protected function validate(): array
    {
        $errors = [];

        if (empty($this->documentUrl)) {
            $errors[] = 'Document URL is required';
        }

        if (! filter_var($this->documentUrl, FILTER_VALIDATE_URL)) {
            $errors[] = 'Invalid document URL';
        }

        return $errors;
    }

    public function body(): array
    {
        $body = [
            'documentUrl' => $this->documentUrl,
        ];

        if ($this->languages !== null) {
            $body['languages'] = $this->languages;
        }

        if ($this->purposes !== null) {
            $body['purposes'] = $this->purposes;
        }

        return $body;
    }
}
