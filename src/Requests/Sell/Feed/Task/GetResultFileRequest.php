<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Feed\Task;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Result File Request
 *
 * Downloads the report file associated with the specified task ID.
 */
class GetResultFileRequest extends Request
{
    protected string $taskId;

    public function __construct(?EbayClient $client, string $taskId)
    {
        parent::__construct($client);
        $this->taskId = $taskId;
    }

    public function endpoint(): string
    {
        return "/sell/feed/v1/task/{$this->taskId}/download_result_file";
    }

    public function method(): string
    {
        return 'GET';
    }
}
