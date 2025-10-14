<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Negotiation\Offer;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Negotiation\SendOfferResponseData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Send Offer To Interested Buyers Request
 *
 * Sends eligible buyers an offer to purchase items at a discount.
 */
class SendOfferToInterestedBuyersRequest extends Request
{
    protected ?bool $allowCounterOffer = null;

    protected ?string $message = null;

    protected ?array $offeredItems = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function allowCounterOffer(bool $allowCounterOffer): self
    {
        $this->allowCounterOffer = $allowCounterOffer;

        return $this;
    }

    public function message(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function addOfferedItem(string $listingId, ?float $discountPercentage = null, ?float $price = null, ?int $quantity = null): self
    {
        $item = ['listingId' => $listingId];

        if ($discountPercentage !== null) {
            $item['discountPercentage'] = (string) $discountPercentage;
        }

        if ($price !== null) {
            $item['price'] = [
                'value' => (string) $price,
                'currency' => 'USD', // Could be made configurable
            ];
        }

        if ($quantity !== null) {
            $item['quantity'] = $quantity;
        }

        if ($this->offeredItems === null) {
            $this->offeredItems = [];
        }

        $this->offeredItems[] = $item;

        return $this;
    }

    public function offeredItems(array $offeredItems): self
    {
        $this->offeredItems = $offeredItems;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/negotiation/v1/send_offer_to_interested_buyers';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        $body = [];

        if ($this->allowCounterOffer !== null) {
            $body['allowCounterOffer'] = $this->allowCounterOffer;
        }

        if ($this->message !== null) {
            $body['message'] = $this->message;
        }

        if ($this->offeredItems !== null) {
            $body['offeredItems'] = $this->offeredItems;
        }

        return $body;
    }

    protected function dto(): ?string
    {
        return SendOfferResponseData::class;
    }

    protected function validate(): array
    {
        $errors = [];

        if ($this->offeredItems === null || empty($this->offeredItems)) {
            $errors['offeredItems'] = 'At least one offered item is required';
        }

        foreach ($this->offeredItems ?? [] as $index => $item) {
            if (empty($item['listingId'])) {
                $errors["offeredItems[{$index}].listingId"] = 'Listing ID is required for each offered item';
            }

            $hasDiscount = isset($item['discountPercentage']);
            $hasPrice = isset($item['price']);

            if (! $hasDiscount && ! $hasPrice) {
                $errors["offeredItems[{$index}]"] = 'Either discountPercentage or price must be provided';
            }

            if ($hasDiscount && $hasPrice) {
                $errors["offeredItems[{$index}]"] = 'Cannot provide both discountPercentage and price';
            }
        }

        if ($this->message !== null && mb_strlen($this->message) > 500) {
            $errors['message'] = 'Message cannot exceed 500 characters';
        }

        return $errors;
    }
}
