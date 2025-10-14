<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\CaseManagement;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Issue Case Refund Request
 *
 * Seller issues a refund for a case (Item Not Received or Item Not As Described).
 */
class IssueCaseRefundRequest extends Request
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
        return "/post-order/v2/casemanagement/{$this->caseId}/issue_refund";
    }

    /**
     * Set refund amount (required)
     */
    public function refundAmount(string $value, string $currency = 'USD'): static
    {
        $this->payload['refund'] = [
            'value' => $value,
            'currency' => $currency,
        ];

        return $this;
    }

    /**
     * Set comments about the refund
     */
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
