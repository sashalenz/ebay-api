<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Media Status Enum
 *
 * Status values for images, videos, and documents.
 */
enum MediaStatus: string
{
    case PENDING = 'PENDING';
    case PROCESSING = 'PROCESSING';
    case LIVE = 'LIVE';
    case FAILED = 'FAILED';
    case BLOCKED = 'BLOCKED';
}
