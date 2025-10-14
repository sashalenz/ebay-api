<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Locale Enum
 *
 * Locale values for inventory items.
 *
 * @see https://developer.ebay.com/api-docs/sell/inventory/types/slr:LocaleEnum
 */
enum Locale: string
{
    case EN_US = 'en_US';
    case EN_CA = 'en_CA';
    case FR_CA = 'fr_CA';
    case EN_GB = 'en_GB';
    case EN_AU = 'en_AU';
    case DE_AT = 'de_AT';
    case FR_BE = 'fr_BE';
    case FR_FR = 'fr_FR';
    case DE_DE = 'de_DE';
    case IT_IT = 'it_IT';
    case NL_BE = 'nl_BE';
    case NL_NL = 'nl_NL';
    case ES_ES = 'es_ES';
    case DE_CH = 'de_CH';
    case ZH_HK = 'zh_HK';
    case EN_IN = 'en_IN';
    case EN_IE = 'en_IE';
    case EN_MY = 'en_MY';
    case EN_PH = 'en_PH';
    case PL_PL = 'pl_PL';
    case EN_SG = 'en_SG';
}
