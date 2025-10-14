<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Translation;

use Sashalenz\EbayApi\Data\Sell\Translation\TranslationData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Translate Request
 *
 * Translates item title or item description from one language to another.
 *
 * Supported languages:
 * - en (English)
 * - de (German)
 * - fr (French)
 * - it (Italian)
 * - es (Spanish)
 * - zh-Hans (Simplified Chinese)
 * - zh-Hant (Traditional Chinese)
 *
 * Example: Translate from English to German:
 * ```php
 * $translation = TranslateRequest::make()
 *     ->from('en')
 *     ->to('de')
 *     ->text(['Vintage Camera', 'Red Shoes'])
 *     ->context('ITEM_TITLE')
 *     ->translationContext('BUYER')
 *     ->asData();
 * ```
 */
class TranslateRequest extends Request
{
    protected string $method = 'POST';

    protected ?string $dataClass = TranslationData::class;

    protected array $payload = [];

    public function __construct() {}

    /**
     * Create request instance
     */
    public static function make(): static
    {
        return new static;
    }

    public function resolveEndpoint(): string
    {
        return '/sell/translation/v1_beta/translate';
    }

    /**
     * Set source language (required)
     */
    public function from(string $language): static
    {
        $this->payload['from'] = $language;

        return $this;
    }

    /**
     * Set target language (required)
     */
    public function to(string $language): static
    {
        $this->payload['to'] = $language;

        return $this;
    }

    /**
     * Set text to translate (required)
     * Can be single string or array of strings
     */
    public function text(string|array $text): static
    {
        $this->payload['text'] = is_array($text) ? $text : [$text];

        return $this;
    }

    /**
     * Set context type (optional)
     * Values: ITEM_TITLE, ITEM_DESCRIPTION
     */
    public function context(string $context): static
    {
        $this->payload['context'] = $context;

        return $this;
    }

    /**
     * Set translation context (optional)
     * Values: BUYER, SELLER
     */
    public function translationContext(string $translationContext): static
    {
        $this->payload['translationContext'] = $translationContext;

        return $this;
    }

    public function defaultBody(): array
    {
        return $this->payload;
    }
}
