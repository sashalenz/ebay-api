<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Cancellation;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Confirm Cancellation Refund Request
 *
 * Buyer confirms that the refund from a cancelled order was received.
 */
class ConfirmCancellationRefundRequest extends Request
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
        return "/post-order/v2/cancellation/{$this->cancelId}/confirm";
    }
}
