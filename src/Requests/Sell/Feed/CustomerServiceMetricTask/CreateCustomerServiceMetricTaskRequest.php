<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Feed\CustomerServiceMetricTask;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Feed\TaskData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Customer Service Metric Task Request
 *
 * Configures and creates a customer service metrics download task.
 */
class CreateCustomerServiceMetricTaskRequest extends Request
{
    protected ?string $dateFrom = null;

    protected ?string $dateTo = null;

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

    public function endpoint(): string
    {
        return '/sell/feed/v1/customer_service_metric_task';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        $body = [];

        if ($this->dateFrom !== null) {
            $body['dateFrom'] = $this->dateFrom;
        }

        if ($this->dateTo !== null) {
            $body['dateTo'] = $this->dateTo;
        }

        return $body;
    }

    protected function dto(): ?string
    {
        return TaskData::class;
    }
}
