<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * eBay Marketplace Identifiers
 *
 * Defines the available eBay marketplace identifiers for API requests.
 */
enum MarketplaceId: string
{
    case EBAY_US = 'EBAY_US';
    case EBAY_GB = 'EBAY_GB';
    case EBAY_CA = 'EBAY_CA';
    case EBAY_AU = 'EBAY_AU';
    case EBAY_AT = 'EBAY_AT';
    case EBAY_BE = 'EBAY_BE';
    case EBAY_FR = 'EBAY_FR';
    case EBAY_DE = 'EBAY_DE';
    case EBAY_IT = 'EBAY_IT';
    case EBAY_NL = 'EBAY_NL';
    case EBAY_ES = 'EBAY_ES';
    case EBAY_CH = 'EBAY_CH';
    case EBAY_HK = 'EBAY_HK';
    case EBAY_IN = 'EBAY_IN';
    case EBAY_IE = 'EBAY_IE';
    case EBAY_MY = 'EBAY_MY';
    case EBAY_PH = 'EBAY_PH';
    case EBAY_PL = 'EBAY_PL';
    case EBAY_SG = 'EBAY_SG';

    /**
     * Get the country code for the marketplace
     */
    public function countryCode(): string
    {
        return match ($this) {
            self::EBAY_US => 'US',
            self::EBAY_GB => 'GB',
            self::EBAY_CA => 'CA',
            self::EBAY_AU => 'AU',
            self::EBAY_AT => 'AT',
            self::EBAY_BE => 'BE',
            self::EBAY_FR => 'FR',
            self::EBAY_DE => 'DE',
            self::EBAY_IT => 'IT',
            self::EBAY_NL => 'NL',
            self::EBAY_ES => 'ES',
            self::EBAY_CH => 'CH',
            self::EBAY_HK => 'HK',
            self::EBAY_IN => 'IN',
            self::EBAY_IE => 'IE',
            self::EBAY_MY => 'MY',
            self::EBAY_PH => 'PH',
            self::EBAY_PL => 'PL',
            self::EBAY_SG => 'SG',
        };
    }

    /**
     * @return array<int, string>
     */
    public static function keys(): array
    {
        return array_map(static fn (self $c): string => $c->value, self::cases());
    }
}
