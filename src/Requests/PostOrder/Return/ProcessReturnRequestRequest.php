<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Process Return Request Request
 *
 * Seller or buyer performs an action against a return request (accept, reject, etc.).
 */
class ProcessReturnRequestRequest extends Request
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
        return "/post-order/v2/return/{$this->returnId}/decide";
    }

    public function decision(string $decision): static
    {
        $this->payload['decision'] = $decision;

        return $this;
    }

    public function partialRefundAmount(string $value, string $currency = 'USD'): static
    {
        $this->payload['partialRefundAmount'] = [
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

    public function rmaNumber(string $rmaNumber): static
    {
        $this->payload['RMANumber'] = $rmaNumber;

        return $this;
    }

    public function defaultBody(): array
    {
        return $this->payload;
    }
}
