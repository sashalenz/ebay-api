<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Feed Type Enum
 *
 * Types of feeds for the Feed API.
 */
enum FeedType: string
{
    case LMS_ORDER_REPORT = 'LMS_ORDER_REPORT';
    case LMS_ACTIVE_INVENTORY_REPORT = 'LMS_ACTIVE_INVENTORY_REPORT';
    case LMS_ADD_FIXED_PRICE_ITEM = 'LMS_ADD_FIXED_PRICE_ITEM';
    case LMS_REVISE_FIXED_PRICE_ITEM = 'LMS_REVISE_FIXED_PRICE_ITEM';
    case LMS_REVISE_INVENTORY_STATUS = 'LMS_REVISE_INVENTORY_STATUS';
    case LMS_END_FIXED_PRICE_ITEM = 'LMS_END_FIXED_PRICE_ITEM';
}
