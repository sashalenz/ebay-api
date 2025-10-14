<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * eBay Content Language
 *
 * Defines the available content language codes for API requests.
 */
enum ContentLanguage: string
{
    case EN_US = 'en-US';
    case EN_GB = 'en-GB';
    case EN_CA = 'en-CA';
    case EN_AU = 'en-AU';
    case FR_CA = 'fr-CA';
    case FR_FR = 'fr-FR';
    case FR_BE = 'fr-BE';
    case DE_DE = 'de-DE';
    case DE_AT = 'de-AT';
    case DE_CH = 'de-CH';
    case IT_IT = 'it-IT';
    case NL_NL = 'nl-NL';
    case NL_BE = 'nl-BE';
    case ES_ES = 'es-ES';
    case ZH_HK = 'zh-HK';
    case PL_PL = 'pl-PL';

    /**
     * Get the language code portion (e.g., 'en' from 'en-US')
     */
    public function languageCode(): string
    {
        return explode('-', $this->value)[0];
    }

    /**
     * Get the region code portion (e.g., 'US' from 'en-US')
     */
    public function regionCode(): string
    {
        return explode('-', $this->value)[1];
    }
}
