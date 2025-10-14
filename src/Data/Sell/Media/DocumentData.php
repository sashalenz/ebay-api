<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Media;

use Sashalenz\EbayApi\Enums\MediaStatus;
use Spatie\LaravelData\Data;

/**
 * Document Data
 *
 * Represents a document for GPSR compliance.
 */
class DocumentData extends Data
{
    public function __construct(
        public ?string $documentId = null,
        public ?MediaStatus $documentStatus = null,
        public ?string $documentUrl = null,
        public ?array $languages = null,
        public ?array $purposes = null,
        public ?string $creationDate = null,
        public ?int $size = null,
    ) {}
}
