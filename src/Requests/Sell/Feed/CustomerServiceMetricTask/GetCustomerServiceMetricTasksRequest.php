<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Feed\CustomerServiceMetricTask;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Feed\TaskCollectionData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Customer Service Metric Tasks Request
 *
 * Retrieves details and statuses for an array of customer service metric tasks by search criteria.
 */
class GetCustomerServiceMetricTasksRequest extends Request
{
    protected ?string $dateFrom = null;

    protected ?string $dateTo = null;

    protected ?string $lookBackDays = null;

    protected ?int $limit = null;

    protected ?int $offset = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
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

    public function lookBackDays(string $lookBackDays): self
    {
        $this->lookBackDays = $lookBackDays;

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
        return '/sell/feed/v1/customer_service_metric_task';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->dateFrom !== null) {
            $query['date_range.from'] = $this->dateFrom;
        }

        if ($this->dateTo !== null) {
            $query['date_range.to'] = $this->dateTo;
        }

        if ($this->lookBackDays !== null) {
            $query['look_back_days'] = $this->lookBackDays;
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
        return TaskCollectionData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'tasks';
    }
}
