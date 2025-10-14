<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Feed\OrderTask;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Feed\TaskData;
use Sashalenz\EbayApi\Enums\FeedType;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Order Task Request
 *
 * Configures and creates an order report task.
 */
class CreateOrderTaskRequest extends Request
{
    protected FeedType $feedType;

    protected ?string $dateFrom = null;

    protected ?string $dateTo = null;

    protected ?array $orderStatus = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
        $this->feedType = FeedType::LMS_ORDER_REPORT;
    }

    public function dateFrom(string $dateFrom): self
    {
        $this->dateFrom = $dateFrom;

        return $this;
    }

    public function dateTo(string $dateTo): self
    {
        $this->dateTo = $dateTo;

        return $this;
    }

    public function orderStatus(array $orderStatus): self
    {
        $this->orderStatus = $orderStatus;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/feed/v1/order_task';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        $body = [
            'feedType' => $this->feedType->value,
        ];

        $filterCriteria = [];

        if ($this->dateFrom !== null) {
            $filterCriteria['creationDateFrom'] = $this->dateFrom;
        }

        if ($this->dateTo !== null) {
            $filterCriteria['creationDateTo'] = $this->dateTo;
        }

        if ($this->orderStatus !== null) {
            $filterCriteria['orderStatus'] = $this->orderStatus;
        }

        if (! empty($filterCriteria)) {
            $body['filterCriteria'] = $filterCriteria;
        }

        return $body;
    }

    protected function dto(): ?string
    {
        return TaskData::class;
    }
}
