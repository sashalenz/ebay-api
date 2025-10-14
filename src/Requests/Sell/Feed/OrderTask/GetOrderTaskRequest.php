<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Feed\OrderTask;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Feed\TaskData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Order Task Request
 *
 * Retrieves the details for a specified order report task.
 */
class GetOrderTaskRequest extends Request
{
    protected string $taskId;

    public function __construct(?EbayClient $client, string $taskId)
    {
        parent::__construct($client);
        $this->taskId = $taskId;
    }

    public function endpoint(): string
    {
        return "/sell/feed/v1/order_task/{$this->taskId}";
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
