<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Location;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Inventory\LocationData;
use Sashalenz\EbayApi\Data\Sell\Inventory\OperatingHoursData;
use Sashalenz\EbayApi\Data\Sell\Inventory\SpecialHoursData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Inventory Location Request
 *
 * Updates an existing inventory location.
 */
class UpdateInventoryLocationRequest extends Request
{
    protected string $merchantLocationKey;

    protected ?string $name = null;

    protected ?string $phone = null;

    protected ?LocationData $location = null;

    /** @var array<string> */
    protected array $locationTypes = [];

    protected ?string $locationWebUrl = null;

    protected ?string $locationInstructions = null;

    /** @var array<OperatingHoursData> */
    protected array $operatingHours = [];

    /** @var array<SpecialHoursData> */
    protected array $specialHours = [];

    protected ?string $locationAdditionalInformation = null;

    public function __construct(?EbayClient $client, string $merchantLocationKey)
    {
        parent::__construct($client);
        $this->merchantLocationKey = $merchantLocationKey;
    }

    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function phone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function location(LocationData $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function addLocationType(string $locationType): self
    {
        $this->locationTypes[] = $locationType;

        return $this;
    }

    public function locationTypes(array $locationTypes): self
    {
        $this->locationTypes = $locationTypes;

        return $this;
    }

    public function locationWebUrl(string $locationWebUrl): self
    {
        $this->locationWebUrl = $locationWebUrl;

        return $this;
    }

    public function locationInstructions(string $locationInstructions): self
    {
        $this->locationInstructions = $locationInstructions;

        return $this;
    }

    public function addOperatingHours(OperatingHoursData $operatingHours): self
    {
        $this->operatingHours[] = $operatingHours;

        return $this;
    }

    public function operatingHours(array $operatingHours): self
    {
        $this->operatingHours = $operatingHours;

        return $this;
    }

    public function addSpecialHours(SpecialHoursData $specialHours): self
    {
        $this->specialHours[] = $specialHours;

        return $this;
    }

    public function specialHours(array $specialHours): self
    {
        $this->specialHours = $specialHours;

        return $this;
    }

    public function locationAdditionalInformation(string $locationAdditionalInformation): self
    {
        $this->locationAdditionalInformation = $locationAdditionalInformation;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/location/'.urlencode($this->merchantLocationKey).'/update_location_details';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        $body = [];

        if ($this->name !== null) {
            $body['name'] = $this->name;
        }

        if ($this->phone !== null) {
            $body['phone'] = $this->phone;
        }

        if ($this->location !== null) {
            $body['location'] = $this->location->toArray();
        }

        if (! empty($this->locationTypes)) {
            $body['locationTypes'] = $this->locationTypes;
        }

        if ($this->locationWebUrl !== null) {
            $body['locationWebUrl'] = $this->locationWebUrl;
        }

        if ($this->locationInstructions !== null) {
            $body['locationInstructions'] = $this->locationInstructions;
        }

        if (! empty($this->operatingHours)) {
            $body['operatingHours'] = array_map(
                fn (OperatingHoursData $h) => $h->toArray(),
                $this->operatingHours
            );
        }

        if (! empty($this->specialHours)) {
            $body['specialHours'] = array_map(
                fn (SpecialHoursData $h) => $h->toArray(),
                $this->specialHours
            );
        }

        if ($this->locationAdditionalInformation !== null) {
            $body['locationAdditionalInformation'] = $this->locationAdditionalInformation;
        }

        return $body;
    }
}
