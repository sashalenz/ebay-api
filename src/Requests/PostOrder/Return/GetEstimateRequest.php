<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Estimate Request
 *
 * Get an estimate for return shipping costs.
 */
class GetEstimateRequest extends Request
{
    protected string $method = 'GET';

    public function __construct() {}

    public static function make(): static
    {
        return new static;
    }

    public function resolveEndpoint(): string
    {
        return '/post-order/v2/return/estimate';
    }

    public function itemId(string $itemId): static
    {
        return $this->withQueryParam('item_id', $itemId);
    }

    public function transactionId(string $transactionId): static
    {
        return $this->withQueryParam('transaction_id', $transactionId);
    }

    public function returnReason(string $returnReason): static
    {
        return $this->withQueryParam('return_reason', $returnReason);
    }
}
