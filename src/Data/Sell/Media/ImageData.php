<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Media;

use Sashalenz\EbayApi\Enums\MediaStatus;
use Spatie\LaravelData\Data;

/**
 * Image Data
 *
 * Represents an eBay Picture Services (EPS) image.
 */
class ImageData extends Data
{
    public function __construct(
        public ?string $imageId = null,
        public ?string $imageUrl = null,
        public ?MediaStatus $imageStatus = null,
        public ?string $readUri = null,
        public ?int $width = null,
        public ?int $height = null,
        public ?int $size = null,
    ) {}
}
