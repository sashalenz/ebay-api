<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Mark Return Received Request
 *
 * Mark a returned item or replacement item as received by seller or buyer.
 */
class MarkReturnReceivedRequest extends Request
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
        return "/post-order/v2/return/{$this->returnId}/mark_as_received";
    }

    public function comments(string $comments): static
    {
        $this->payload['comments'] = $comments;

        return $this;
    }

    public function defaultBody(): array
    {
        return $this->payload;
    }
}
