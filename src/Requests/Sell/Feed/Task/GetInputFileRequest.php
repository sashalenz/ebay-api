<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Feed\Task;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Input File Request
 *
 * Downloads the upload feed file associated with the specified task ID.
 */
class GetInputFileRequest extends Request
{
    protected string $taskId;

    public function __construct(?EbayClient $client, string $taskId)
    {
        parent::__construct($client);
        $this->taskId = $taskId;
    }

    public function endpoint(): string
    {
        return "/sell/feed/v1/task/{$this->taskId}/download_input_file";
    }

    public function method(): string
    {
        return 'GET';
    }
}
