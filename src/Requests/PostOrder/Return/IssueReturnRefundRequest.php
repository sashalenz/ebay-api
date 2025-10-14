<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Issue Return Refund Request
 *
 * Seller issues a refund for a returned item.
 */
class IssueReturnRefundRequest extends Request
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
        return "/post-order/v2/return/{$this->returnId}/issue_refund";
    }

    public function refundAmount(string $value, string $currency = 'USD'): static
    {
        $this->payload['refundAmount'] = [
            'value' => $value,
            'currency' => $currency,
        ];

        return $this;
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
