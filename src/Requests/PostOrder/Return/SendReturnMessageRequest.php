<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Send Return Message Request
 *
 * Send a message to the other party regarding a return request.
 */
class SendReturnMessageRequest extends Request
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
        return "/post-order/v2/return/{$this->returnId}/send_message";
    }

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
