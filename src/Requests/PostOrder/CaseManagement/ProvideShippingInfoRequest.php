<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\CaseManagement;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Provide Shipping Info Request
 *
 * Seller provides shipping/tracking information for the original order.
 */
class ProvideShippingInfoRequest extends Request
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
        return "/post-order/v2/casemanagement/{$this->caseId}/provide_shipping_info";
    }

    /**
     * Set tracking number
     */
    public function trackingNumber(string $trackingNumber): static
    {
        $this->payload['trackingNumber'] = $trackingNumber;

        return $this;
    }

    /**
     * Set shipping carrier
     */
    public function shippingCarrierName(string $carrier): static
    {
        $this->payload['shippingCarrierName'] = $carrier;

        return $this;
    }

    /**
     * Set comments about the shipment
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
