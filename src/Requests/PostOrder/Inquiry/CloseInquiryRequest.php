<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Inquiry;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Close Inquiry Request
 *
 * Close an inquiry (buyer satisfied with seller's response).
 */
class CloseInquiryRequest extends Request
{
    protected string $method = 'POST';

    protected array $payload = [];

    public function __construct(
        protected string $inquiryId,
    ) {}

    public static function make(string $inquiryId): static
    {
        return new static($inquiryId);
    }

    public function resolveEndpoint(): string
    {
        return "/post-order/v2/inquiry/{$this->inquiryId}/close";
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
