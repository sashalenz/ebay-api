<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\PostOrder\Return;

use Spatie\LaravelData\Data;

/**
 * Return File Data
 *
 * Contains information about uploaded return files (photos, documents).
 */
class ReturnFileData extends Data
{
    public function __construct(
        public ?string $fileId,
        public ?string $fileName,
        public ?string $filePurpose,
        public ?string $uploadDate,
    ) {}
}
