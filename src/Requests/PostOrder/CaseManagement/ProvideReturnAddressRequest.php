<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\CaseManagement;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Provide Return Address Request
 *
 * Seller provides a return address for the buyer to send the item back.
 */
class ProvideReturnAddressRequest extends Request
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
        return "/post-order/v2/casemanagement/{$this->caseId}/provide_return_address";
    }

    /**
     * Set return address
     */
    public function returnAddress(array $address): static
    {
        $this->payload['returnAddress'] = $address;

        return $this;
    }

    /**
     * Set comments about the return address
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
