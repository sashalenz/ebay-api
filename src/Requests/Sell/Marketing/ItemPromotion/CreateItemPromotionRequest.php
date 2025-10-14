<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\ItemPromotion;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Item Promotion Request
 *
 * Creates an item promotion (order/volume discount).
 */
class CreateItemPromotionRequest extends Request
{
    protected array $promotionData;

    public function __construct(?EbayClient $client, array $promotionData)
    {
        parent::__construct($client);
        $this->promotionData = $promotionData;
    }

    public function endpoint(): string
    {
        return '/sell/marketing/v1/item_promotion';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return $this->promotionData;
    }
}
