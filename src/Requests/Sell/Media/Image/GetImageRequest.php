<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Media\Image;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Media\ImageData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Image Request
 *
 * Retrieves the details of a specified image.
 */
class GetImageRequest extends Request
{
    protected string $imageId;

    public function __construct(?EbayClient $client, string $imageId)
    {
        parent::__construct($client);
        $this->imageId = $imageId;
    }

    public function endpoint(): string
    {
        return '/commerce/media/v1_beta/image/'.$this->imageId;
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return ImageData::class;
    }
}
