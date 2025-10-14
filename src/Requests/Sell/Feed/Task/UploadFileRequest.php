<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Feed\Task;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Upload File Request
 *
 * Uploads a feed file associated with the specified task ID.
 */
class UploadFileRequest extends Request
{
    protected string $taskId;

    protected string $filePath;

    public function __construct(?EbayClient $client, string $taskId, string $filePath)
    {
        parent::__construct($client);
        $this->taskId = $taskId;
        $this->filePath = $filePath;
    }

    public function endpoint(): string
    {
        return "/sell/feed/v1/task/{$this->taskId}/upload_file";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return [
            'file' => $this->filePath,
        ];
    }
}
