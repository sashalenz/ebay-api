<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Feed\InventoryTask;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Feed\TaskData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Inventory Task Request
 *
 * Retrieves the details for a specified active inventory report task.
 */
class GetInventoryTaskRequest extends Request
{
    protected string $taskId;

    public function __construct(?EbayClient $client, string $taskId)
    {
        parent::__construct($client);
        $this->taskId = $taskId;
    }

    public function endpoint(): string
    {
        return "/sell/feed/v1/inventory_task/{$this->taskId}";
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
