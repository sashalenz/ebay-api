<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Media\Image;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Image From URL Request
 *
 * Creates an eBay Picture Services (EPS) image from the specified URL.
 */
class CreateImageFromUrlRequest extends Request
{
    protected string $imageUrl;

    public function __construct(?EbayClient $client, string $imageUrl)
    {
        parent::__construct($client);
        $this->imageUrl = $imageUrl;
    }

    public function endpoint(): string
    {
        return '/commerce/media/v1_beta/image/create_image_from_url';
    }

    public function method(): string
    {
        return 'POST';
    }

    protected function validate(): array
    {
        $errors = [];

        if (empty($this->imageUrl)) {
            $errors[] = 'Image URL is required';
        }

        if (! filter_var($this->imageUrl, FILTER_VALIDATE_URL)) {
            $errors[] = 'Invalid image URL';
        }

        return $errors;
    }

    public function body(): array
    {
        return [
            'imageUrl' => $this->imageUrl,
        ];
    }
}
