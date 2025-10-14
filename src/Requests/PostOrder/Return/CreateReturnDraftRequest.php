<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Data\PostOrder\Return\ReturnDraftData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Return Draft Request
 *
 * Create a draft return request that can be completed later.
 */
class CreateReturnDraftRequest extends Request
{
    protected string $method = 'POST';

    protected ?string $dataClass = ReturnDraftData::class;

    protected array $payload = [];

    public function __construct() {}

    public static function make(): static
    {
        return new static;
    }

    public function resolveEndpoint(): string
    {
        return '/post-order/v2/return/draft';
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

    public function defaultBody(): array
    {
        return $this->payload;
    }
}
