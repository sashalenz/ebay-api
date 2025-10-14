<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Fulfillment\Order;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Issue Refund Request
 *
 * Issues a full or partial refund to a buyer on behalf of the seller.
 */
class IssueRefundRequest extends Request
{
    protected string $orderId;

    protected ?array $refundItems = null;

    protected ?array $orderLevelRefundAmount = null;

    protected ?string $reasonForRefund = null;

    protected ?string $comment = null;

    public function __construct(?EbayClient $client, string $orderId)
    {
        parent::__construct($client);
        $this->orderId = $orderId;
    }

    public function refundItems(array $refundItems): self
    {
        $this->refundItems = $refundItems;

        return $this;
    }

    public function orderLevelRefundAmount(array $orderLevelRefundAmount): self
    {
        $this->orderLevelRefundAmount = $orderLevelRefundAmount;

        return $this;
    }

    public function reasonForRefund(string $reasonForRefund): self
    {
        $this->reasonForRefund = $reasonForRefund;

        return $this;
    }

    public function comment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/fulfillment/v1/order/{$this->orderId}/issue_refund";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        $body = [];

        if ($this->refundItems !== null) {
            $body['refundItems'] = $this->refundItems;
        }

        if ($this->orderLevelRefundAmount !== null) {
            $body['orderLevelRefundAmount'] = $this->orderLevelRefundAmount;
        }

        if ($this->reasonForRefund !== null) {
            $body['reasonForRefund'] = $this->reasonForRefund;
        }

        if ($this->comment !== null) {
            $body['comment'] = $this->comment;
        }

        return $body;
    }
}
