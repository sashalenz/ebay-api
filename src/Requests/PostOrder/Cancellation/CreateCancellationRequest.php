<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Cancellation;

use Sashalenz\EbayApi\Data\PostOrder\Cancellation\CancellationData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Cancellation Request
 *
 * Request or perform an order cancellation.
 * Buyer or seller can initiate cancellation depending on order state.
 */
class CreateCancellationRequest extends Request
{
    protected string $method = 'POST';

    protected ?string $dataClass = CancellationData::class;

    protected array $payload = [];

    public function __construct() {}

    public static function make(): static
    {
        return new static;
    }

    public function resolveEndpoint(): string
    {
        return '/post-order/v2/cancellation';
    }

    /**
     * Set cancellation reason (required)
     */
    public function cancelReason(string $cancelReason): static
    {
        $this->payload['cancelReason'] = $cancelReason;

        return $this;
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

    /**
     * Set cancellation reason message
     */
    public function cancelReasonMessage(string $message): static
    {
        $this->payload['cancelReasonMessage'] = $message;

        return $this;
    }

    public function defaultBody(): array
    {
        return $this->payload;
    }
}
