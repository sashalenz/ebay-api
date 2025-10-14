<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Inquiry;

use Sashalenz\EbayApi\Data\PostOrder\Inquiry\InquiryData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Inquiry Request
 *
 * Buyer creates an inquiry about an order issue.
 */
class CreateInquiryRequest extends Request
{
    protected string $method = 'POST';

    protected ?string $dataClass = InquiryData::class;

    protected array $payload = [];

    public function __construct() {}

    public static function make(): static
    {
        return new static;
    }

    public function resolveEndpoint(): string
    {
        return '/post-order/v2/inquiry';
    }

    public function itemId(string $itemId): static
    {
        $this->payload['itemId'] = $itemId;

        return $this;
    }

    public function transactionId(string $transactionId): static
    {
        $this->payload['transactionId'] = $transactionId;

        return $this;
    }

    public function inquirySubject(string $subject): static
    {
        $this->payload['inquirySubject'] = $subject;

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
