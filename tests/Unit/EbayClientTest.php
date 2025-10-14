<?php

declare(strict_types=1);

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Enums\ContentLanguage;
use Sashalenz\EbayApi\Enums\Environment;
use Sashalenz\EbayApi\Enums\MarketplaceId;

test('ebay client can be instantiated', function () {
    $client = new EbayClient(
        appId: 'test_app_id',
        certId: 'test_cert_id',
        environment: Environment::SANDBOX,
        marketplaceId: MarketplaceId::EBAY_US,
        contentLanguage: ContentLanguage::EN_US
    );

    expect($client)->toBeInstanceOf(EbayClient::class);
    expect($client->getEnvironment())->toBe(Environment::SANDBOX);
    expect($client->getMarketplaceId())->toBe(MarketplaceId::EBAY_US);
    expect($client->getContentLanguage())->toBe(ContentLanguage::EN_US);
});
