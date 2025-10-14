<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Media\Document;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Media\DocumentData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Document Request
 *
 * Retrieves the details and status of the specified document.
 */
class GetDocumentRequest extends Request
{
    protected string $documentId;

    public function __construct(?EbayClient $client, string $documentId)
    {
        parent::__construct($client);
        $this->documentId = $documentId;
    }

    public function endpoint(): string
    {
        return '/commerce/media/v1_beta/document/'.$this->documentId;
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return DocumentData::class;
    }
}
