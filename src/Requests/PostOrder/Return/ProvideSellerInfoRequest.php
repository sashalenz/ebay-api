<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Provide Seller Info Request
 *
 * Seller provides additional information about a return request.
 */
class ProvideSellerInfoRequest extends Request
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
        return "/post-order/v2/return/{$this->returnId}/provide_seller_info";
    }

    public function comments(string $comments): static
    {
        $this->payload['comments'] = $comments;

        return $this;
    }

    public function returnAddress(array $address): static
    {
        $this->payload['returnAddress'] = $address;

        return $this;
    }

    public function defaultBody(): array
    {
        return $this->payload;
    }
}
