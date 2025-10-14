<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Cancellation;

use Sashalenz\EbayApi\Data\PostOrder\Cancellation\CancellationEligibilityData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Check Cancellation Eligibility Request
 *
 * Verify if an order is eligible to be cancelled by buyer or seller.
 */
class CheckCancellationEligibilityRequest extends Request
{
    protected string $method = 'POST';

    protected ?string $dataClass = CancellationEligibilityData::class;

    protected array $payload = [];

    public function __construct() {}

    public static function make(): static
    {
        return new static;
    }

    public function resolveEndpoint(): string
    {
        return '/post-order/v2/cancellation/check_eligibility';
    }

    /**
     * Set legacy order ID
     */
    public function legacyOrderId(string $legacyOrderId): static
    {
        $this->payload['legacyOrderId'] = $legacyOrderId;

        return $this;
    }

    /**
     * Set order ID
     */
    public function orderId(string $orderId): static
    {
        $this->payload['orderId'] = $orderId;

        return $this;
    }

    public function defaultBody(): array
    {
        return $this->payload;
    }
}
