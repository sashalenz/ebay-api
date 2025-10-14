<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

enum PromotionType: string
{
    case MARKDOWN_SALE = 'MARKDOWN_SALE';
    case ORDER_DISCOUNT = 'ORDER_DISCOUNT';
    case VOLUME_DISCOUNT = 'VOLUME_DISCOUNT';
    case SHIPPING_DISCOUNT = 'SHIPPING_DISCOUNT';
}
