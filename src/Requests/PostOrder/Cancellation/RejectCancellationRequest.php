<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Cancellation;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Reject Cancellation Request
 *
 * Seller rejects a buyer's cancellation request.
 * A reason message should be provided explaining why the cancellation was rejected.
 */
class RejectCancellationRequest extends Request
{
    protected string $method = 'POST';

    protected array $payload = [];

    public function __construct(
        protected string $cancelId,
    ) {}

    public static function make(string $cancelId): static
    {
        return new static($cancelId);
    }

    public function resolveEndpoint(): string
    {
        return "/post-order/v2/cancellation/{$this->cancelId}/reject";
    }

    /**
     * Set rejection reason message (optional)
     */
    public function rejectReasonMessage(string $message): static
    {
        $this->payload['rejectReasonMessage'] = $message;

        return $this;
    }

    public function defaultBody(): array
    {
        return $this->payload;
    }
}
