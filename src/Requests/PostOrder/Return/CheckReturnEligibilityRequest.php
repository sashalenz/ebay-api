<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Check Return Eligibility Request
 *
 * Verify if an item is eligible for return.
 */
class CheckReturnEligibilityRequest extends Request
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
        return '/post-order/v2/return/check_eligibility';
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

    public function returnReason(string $returnReason): static
    {
        $this->payload['returnReason'] = $returnReason;

        return $this;
    }

    public function defaultBody(): array
    {
        return $this->payload;
    }
}
