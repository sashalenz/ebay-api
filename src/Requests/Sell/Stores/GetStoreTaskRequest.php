<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Stores;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Stores\StoreTaskData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Store Task Request
 *
 * Retrieves the status of a specific store category task.
 *
 * @see https://developer.ebay.com/api-docs/sell/stores/resources/store/methods/getStoreTask
 */
class GetStoreTaskRequest extends Request
{
    protected string $taskId;

    public function __construct(?EbayClient $client, string $taskId)
    {
        parent::__construct($client);
        $this->taskId = $taskId;
    }

    public function endpoint(): string
    {
        return '/sell/stores/v1/store/task/'.$this->taskId;
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return StoreTaskData::class;
    }
}
