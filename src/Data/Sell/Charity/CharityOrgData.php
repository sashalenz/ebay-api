<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Charity;

use Spatie\LaravelData\Data;

/**
 * Charity Organization Data
 *
 * Details about a charitable organization.
 */
class CharityOrgData extends Data
{
    public function __construct(
        public ?string $charityOrgId = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $logoImage = null,
        public ?string $mission = null,
        public ?string $registrationId = null,
        public ?string $website = null,
        public ?LocationData $location = null,
    ) {}
}
