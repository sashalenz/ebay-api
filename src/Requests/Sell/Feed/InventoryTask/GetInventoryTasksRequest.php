<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Feed\InventoryTask;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Feed\TaskCollectionData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Inventory Tasks Request
 *
 * Retrieves the details on one or more active inventory report tasks based on search criteria.
 */
class GetInventoryTasksRequest extends Request
{
    protected ?string $scheduleId = null;

    protected ?string $lookBackDays = null;

    protected ?int $limit = null;

    protected ?int $offset = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function scheduleId(string $scheduleId): self
    {
        $this->scheduleId = $scheduleId;

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
        return '/sell/feed/v1/inventory_task';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->scheduleId !== null) {
            $query['schedule_id'] = $this->scheduleId;
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
