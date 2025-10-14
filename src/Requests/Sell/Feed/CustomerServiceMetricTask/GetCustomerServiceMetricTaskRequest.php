<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Feed\CustomerServiceMetricTask;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Feed\TaskData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Customer Service Metric Task Request
 *
 * Retrieves the customer service metrics task details for the specified task ID.
 */
class GetCustomerServiceMetricTaskRequest extends Request
{
    protected string $taskId;

    public function __construct(?EbayClient $client, string $taskId)
    {
        parent::__construct($client);
        $this->taskId = $taskId;
    }

    public function endpoint(): string
    {
        return "/sell/feed/v1/customer_service_metric_task/{$this->taskId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return TaskData::class;
    }
}
