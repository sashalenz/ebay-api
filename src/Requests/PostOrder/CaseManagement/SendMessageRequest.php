<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\CaseManagement;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Send Message Request
 *
 * Send a message to the other party in a case.
 */
class SendMessageRequest extends Request
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
        return "/post-order/v2/casemanagement/{$this->caseId}/send_message";
    }

    /**
     * Set message text (required)
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
