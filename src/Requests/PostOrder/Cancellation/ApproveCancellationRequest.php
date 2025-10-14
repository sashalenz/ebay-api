<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Cancellation;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Approve Cancellation Request
 *
 * Seller approves a buyer's cancellation request.
 * After approval, eBay processes the refund automatically.
 */
class ApproveCancellationRequest extends Request
{
    protected string $method = 'POST';

    public function __construct(
        protected string $cancelId,
    ) {}

    public static function make(string $cancelId): static
    {
        return new static($cancelId);
    }

    public function resolveEndpoint(): string
    {
        return "/post-order/v2/cancellation/{$this->cancelId}/approve";
    }
}
