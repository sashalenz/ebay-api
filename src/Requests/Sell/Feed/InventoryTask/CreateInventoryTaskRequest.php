<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Feed\InventoryTask;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Feed\TaskData;
use Sashalenz\EbayApi\Enums\FeedType;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Inventory Task Request
 *
 * Configures and creates an active inventory report task.
 */
class CreateInventoryTaskRequest extends Request
{
    protected FeedType $feedType;

    protected ?string $schemaVersion = null;

    protected ?array $inventoryFileTemplate = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
        $this->feedType = FeedType::LMS_ACTIVE_INVENTORY_REPORT;
    }

    public function schemaVersion(string $schemaVersion): self
    {
        $this->schemaVersion = $schemaVersion;

        return $this;
    }

    public function inventoryFileTemplate(array $inventoryFileTemplate): self
    {
        $this->inventoryFileTemplate = $inventoryFileTemplate;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/feed/v1/inventory_task';
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

        if ($this->schemaVersion !== null) {
            $body['schemaVersion'] = $this->schemaVersion;
        }

        if ($this->inventoryFileTemplate !== null) {
            $body['inventoryFileTemplate'] = $this->inventoryFileTemplate;
        }

        return $body;
    }

    protected function dto(): ?string
    {
        return TaskData::class;
    }
}
