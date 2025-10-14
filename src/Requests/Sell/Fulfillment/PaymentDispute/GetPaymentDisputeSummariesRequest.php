<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Fulfillment\PaymentDispute;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Fulfillment\PaymentDisputeSummariesData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Payment Dispute Summaries Request
 *
 * Retrieves payment disputes based on search criteria.
 */
class GetPaymentDisputeSummariesRequest extends Request
{
    protected ?string $orderId = null;

    protected ?string $buyerUsername = null;

    protected ?string $openDateFrom = null;

    protected ?string $openDateTo = null;

    protected ?string $paymentDisputeStatus = null;

    protected ?int $limit = null;

    protected ?int $offset = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function orderId(string $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function buyerUsername(string $buyerUsername): self
    {
        $this->buyerUsername = $buyerUsername;

        return $this;
    }

    public function openDateFrom(string $openDateFrom): self
    {
        $this->openDateFrom = $openDateFrom;

        return $this;
    }

    public function openDateTo(string $openDateTo): self
    {
        $this->openDateTo = $openDateTo;

        return $this;
    }

    public function paymentDisputeStatus(string $paymentDisputeStatus): self
    {
        $this->paymentDisputeStatus = $paymentDisputeStatus;

        return $this;
    }

    public function limit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    public function offset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/fulfillment/v1/payment_dispute_summary';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->orderId !== null) {
            $query['order_id'] = $this->orderId;
        }

        if ($this->buyerUsername !== null) {
            $query['buyer_username'] = $this->buyerUsername;
        }

        if ($this->openDateFrom !== null) {
            $query['open_date_from'] = $this->openDateFrom;
        }

        if ($this->openDateTo !== null) {
            $query['open_date_to'] = $this->openDateTo;
        }

        if ($this->paymentDisputeStatus !== null) {
            $query['payment_dispute_status'] = $this->paymentDisputeStatus;
        }

        if ($this->limit !== null) {
            $query['limit'] = $this->limit;
        }

        if ($this->offset !== null) {
            $query['offset'] = $this->offset;
        }

        return $query;
    }

    protected function dto(): ?string
    {
        return PaymentDisputeSummariesData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'paymentDisputes';
    }
}
