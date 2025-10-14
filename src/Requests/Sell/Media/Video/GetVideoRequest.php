<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Media\Video;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Media\VideoData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Video Request
 *
 * Retrieves the details for a specified video.
 */
class GetVideoRequest extends Request
{
    protected string $videoId;

    public function __construct(?EbayClient $client, string $videoId)
    {
        parent::__construct($client);
        $this->videoId = $videoId;
    }

    public function endpoint(): string
    {
        return '/commerce/media/v1_beta/video/'.$this->videoId;
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return VideoData::class;
    }
}
