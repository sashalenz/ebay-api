<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Escalate Return Request
 *
 * Escalate a return request to eBay Customer Service for review.
 */
class EscalateReturnRequest extends Request
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
        return "/post-order/v2/return/{$this->returnId}/escalate";
    }

    public function comments(string $comments): static
    {
        $this->payload['comments'] = $comments;

        return $this;
    }

    public function escalationReason(string $reason): static
    {
        $this->payload['escalationReason'] = $reason;

        return $this;
    }

    public function defaultBody(): array
    {
        return $this->payload;
    }
}
