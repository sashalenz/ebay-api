<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Feed\Task;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Feed\TaskData;
use Sashalenz\EbayApi\Enums\FeedType;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Task Request
 *
 * Creates an upload feed file task and returns a task ID.
 */
class CreateTaskRequest extends Request
{
    protected FeedType $feedType;

    protected ?string $schemaVersion = null;

    public function __construct(?EbayClient $client, FeedType $feedType)
    {
        parent::__construct($client);
        $this->feedType = $feedType;
    }

    public function schemaVersion(string $schemaVersion): self
    {
        $this->schemaVersion = $schemaVersion;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/feed/v1/task';
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

        return $body;
    }

    protected function dto(): ?string
    {
        return TaskData::class;
    }
}
