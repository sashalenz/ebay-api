<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Media\Document;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Document Request
 *
 * Creates a document ID with metadata for uploading a document file (GPSR regulations).
 */
class CreateDocumentRequest extends Request
{
    protected ?array $languages = null;

    protected ?array $purposes = null;

    public function __construct(?EbayClient $client)
    {
        parent::__construct($client);
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
        return '/commerce/media/v1_beta/document';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        $body = [];

        if ($this->languages !== null) {
            $body['languages'] = $this->languages;
        }

        if ($this->purposes !== null) {
            $body['purposes'] = $this->purposes;
        }

        return $body;
    }
}
