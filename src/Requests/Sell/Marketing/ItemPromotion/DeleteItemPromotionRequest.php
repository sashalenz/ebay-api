<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\ItemPromotion;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Delete Item Promotion Request
 *
 * Deletes an item promotion.
 */
class DeleteItemPromotionRequest extends Request
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
        return 'DELETE';
    }
}
