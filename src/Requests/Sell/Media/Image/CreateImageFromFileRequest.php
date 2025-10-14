<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Media\Image;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Image From File Request
 *
 * Creates an eBay Picture Services (EPS) image by uploading a file using multipart/form-data.
 */
class CreateImageFromFileRequest extends Request
{
    protected string $filePath;

    protected ?string $fileName = null;

    public function __construct(?EbayClient $client, string $filePath)
    {
        parent::__construct($client);
        $this->filePath = $filePath;
    }

    public function fileName(string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function endpoint(): string
    {
        return '/commerce/media/v1_beta/image/create_image_from_file';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function headers(): array
    {
        return [
            'Content-Type' => 'multipart/form-data',
        ];
    }

    protected function validate(): array
    {
        $errors = [];

        if (! file_exists($this->filePath)) {
            $errors[] = 'File does not exist: '.$this->filePath;
        }

        return $errors;
    }
}
