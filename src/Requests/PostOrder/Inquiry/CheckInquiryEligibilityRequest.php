<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Inquiry;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Check Inquiry Eligibility Request
 *
 * Verify if an item is eligible for buyer inquiry.
 */
class CheckInquiryEligibilityRequest extends Request
{
    protected string $method = 'POST';

    protected array $payload = [];

    public function __construct() {}

    public static function make(): static
    {
        return new static;
    }

    public function resolveEndpoint(): string
    {
        return '/post-order/v2/inquiry/check_eligibility';
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

    public function defaultBody(): array
    {
        return $this->payload;
    }
}
