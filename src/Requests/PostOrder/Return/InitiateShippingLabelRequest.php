<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Data\PostOrder\Return\ShippingLabelData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Initiate Shipping Label Request
 *
 * Generate a return shipping label for the buyer.
 */
class InitiateShippingLabelRequest extends Request
{
    protected string $method = 'POST';

    protected ?string $dataClass = ShippingLabelData::class;

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
        return "/post-order/v2/return/{$this->returnId}/initiate_shipping_label";
    }

    public function carrier(string $carrier): static
    {
        $this->payload['shippingCarrierName'] = $carrier;

        return $this;
    }

    public function defaultBody(): array
    {
        return $this->payload;
    }
}
