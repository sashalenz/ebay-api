<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Media\Video;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Upload Video Request
 *
 * Uploads a video based on a provided video input source file and video ID.
 */
class UploadVideoRequest extends Request
{
    protected string $videoId;

    protected string $filePath;

    public function __construct(?EbayClient $client, string $videoId, string $filePath)
    {
        parent::__construct($client);
        $this->videoId = $videoId;
        $this->filePath = $filePath;
    }

    public function endpoint(): string
    {
        return '/commerce/media/v1_beta/video/'.$this->videoId.'/upload';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function headers(): array
    {
        return [
            'Content-Type' => 'application/octet-stream',
        ];
    }

    protected function validate(): array
    {
        $errors = [];

        if (! file_exists($this->filePath)) {
            $errors[] = 'Video file does not exist: '.$this->filePath;
        }

        return $errors;
    }
}
