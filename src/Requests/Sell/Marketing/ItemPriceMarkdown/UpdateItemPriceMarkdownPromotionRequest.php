<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\ItemPriceMarkdown;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Item Price Markdown Promotion Request
 *
 * Updates a markdown sale promotion.
 */
class UpdateItemPriceMarkdownPromotionRequest extends Request
{
    protected string $promotionId;

    protected array $promotionData;

    public function __construct(?EbayClient $client, string $promotionId, array $promotionData)
    {
        parent::__construct($client);
        $this->promotionId = $promotionId;
        $this->promotionData = $promotionData;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/item_price_markdown/{$this->promotionId}";
    }

    public function method(): string
    {
        return 'PUT';
    }

    public function body(): array
    {
        return $this->promotionData;
    }
}
