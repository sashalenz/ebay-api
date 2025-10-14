<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Set Return Preferences Request
 *
 * Set seller's return preferences (auto-accept returns, etc.).
 */
class SetReturnPreferencesRequest extends Request
{
    protected string $method = 'POST';

    protected array $payload = [];

    public function __construct() {}

    public static function make(): static
    {
        return new static;
    }

    public function resolveEndpoint(): string
    {
        return '/post-order/v2/return/preference';
    }

    public function optInStatus(bool $optIn): static
    {
        $this->payload['optInStatus'] = $optIn;

        return $this;
    }

    public function defaultBody(): array
    {
        return $this->payload;
    }
}
