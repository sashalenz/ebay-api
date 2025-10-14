<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\ItemPriceMarkdown;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Item Price Markdown Promotion Request
 *
 * Creates a markdown sale promotion.
 */
class CreateItemPriceMarkdownPromotionRequest extends Request
{
    protected array $promotionData;

    public function __construct(?EbayClient $client, array $promotionData)
    {
        parent::__construct($client);
        $this->promotionData = $promotionData;
    }

    public function endpoint(): string
    {
        return '/sell/marketing/v1/item_price_markdown';
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
