<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Document Purpose Enum
 *
 * Possible purposes for documents (GPSR compliance).
 */
enum DocumentPurpose: string
{
    case PRODUCT_SAFETY = 'PRODUCT_SAFETY';
    case PRODUCT_COMPLIANCE = 'PRODUCT_COMPLIANCE';
    case MANUFACTURER_INFO = 'MANUFACTURER_INFO';
    case IMPORTER_INFO = 'IMPORTER_INFO';
}
