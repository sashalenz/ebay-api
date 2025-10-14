<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\ItemPromotion;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\PromotionData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Item Promotion Request
 *
 * Retrieves an item promotion.
 */
class GetItemPromotionRequest extends Request
{
    protected string $promotionId;

    public function __construct(?EbayClient $client, string $promotionId)
    {
        parent::__construct($client);
        $this->promotionId = $promotionId;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/item_promotion/{$this->promotionId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return PromotionData::class;
    }
}
