<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Media\Video;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Video Request
 *
 * Provides metadata for a video that will be uploaded via uploadVideo.
 */
class CreateVideoRequest extends Request
{
    protected string $title;

    protected ?string $description = null;

    protected ?int $size = null;

    public function __construct(?EbayClient $client, string $title)
    {
        parent::__construct($client);
        $this->title = $title;
    }

    public function description(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function size(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function endpoint(): string
    {
        return '/commerce/media/v1_beta/video';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        $body = [
            'title' => $this->title,
        ];

        if ($this->description !== null) {
            $body['description'] = $this->description;
        }

        if ($this->size !== null) {
            $body['size'] = $this->size;
        }

        return $body;
    }
}
