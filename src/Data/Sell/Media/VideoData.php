<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Media;

use Sashalenz\EbayApi\Enums\MediaStatus;
use Spatie\LaravelData\Data;

/**
 * Video Data
 *
 * Represents a video in eBay's media system.
 */
class VideoData extends Data
{
    public function __construct(
        public ?string $videoId = null,
        public ?string $title = null,
        public ?string $description = null,
        public ?MediaStatus $status = null,
        public ?string $uploadedDate = null,
        public ?int $size = null,
        public ?int $duration = null,
        public ?array $playLists = null,
        public ?string $thumbnailImageUrl = null,
    ) {}
}
