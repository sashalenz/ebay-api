<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Data\PostOrder\Return\ReturnData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Return Request
 *
 * Buyer creates a return request for an item.
 */
class CreateReturnRequest extends Request
{
    protected string $method = 'POST';

    protected ?string $dataClass = ReturnData::class;

    protected array $payload = [];

    public function __construct() {}

    public static function make(): static
    {
        return new static;
    }

    public function resolveEndpoint(): string
    {
        return '/post-order/v2/return';
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

    public function comments(string $comments): static
    {
        $this->payload['comments'] = $comments;

        return $this;
    }

    public function preferredResolution(string $resolution): static
    {
        $this->payload['preferredResolution'] = $resolution;

        return $this;
    }

    public function defaultBody(): array
    {
        return $this->payload;
    }
}
