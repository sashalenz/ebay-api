<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Client\Auth;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Cache;
use Sashalenz\EbayApi\Enums\Environment;
use Sashalenz\EbayApi\Exceptions\AuthenticationException;

/**
 * Application Token Manager
 *
 * Handles OAuth 2.0 Application (Client Credentials) token generation and caching.
 * Application tokens are used for accessing public data and seller-specific data.
 */
class ApplicationToken implements AuthInterface
{
    protected string $appId;

    protected string $certId;

    protected Environment $environment;

    protected int $cacheTtl;

    protected string $scopes;

    /**
     * Create a new Application Token instance
     *
     * @param  string  $appId  eBay Application ID (Client ID)
     * @param  string  $certId  eBay Certificate ID (Client Secret)
     * @param  Environment  $environment  API environment (sandbox or production)
     * @param  int  $cacheTtl  Cache TTL in seconds
     * @param  string  $scopes  OAuth scopes (space-separated)
     */
    public function __construct(string $appId, string $certId, Environment $environment, int $cacheTtl = 3300, string $scopes = 'https://api.ebay.com/oauth/api_scope')
    {
        $this->appId = $appId;
        $this->certId = $certId;
        $this->environment = $environment;
        $this->cacheTtl = $cacheTtl;
        $this->scopes = $scopes;
    }

    /**
     * Get a valid access token (from cache or generate new)
     *
     * @throws AuthenticationException
     */
    public function getToken(): string
    {
        $cacheKey = $this->getCacheKey();

        return Cache::remember($cacheKey, $this->cacheTtl, function () {
            return $this->generateToken();
        });
    }

    /**
     * Generate a new OAuth application token
     *
     * @throws AuthenticationException
     */
    protected function generateToken(): string
    {
        if (empty($this->appId) || empty($this->certId)) {
            throw AuthenticationException::invalidCredentials();
        }

        $client = new Client([
            'base_uri' => $this->environment->oauthBaseUrl(),
            'timeout' => 30,
        ]);

        try {
            $response = $client->post('/identity/v1/oauth2/token', [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Basic '.base64_encode($this->appId.':'.$this->certId),
                ],
                'form_params' => [
                    'grant_type' => 'client_credentials',
                    'scope' => $this->getScopes(),
                ],
            ]);

            $data = json_decode((string) $response->getBody(), true);

            if (! isset($data['access_token'])) {
                throw AuthenticationException::tokenGenerationFailed('No access token in response');
            }

            return $data['access_token'];
        } catch (GuzzleException $e) {
            throw AuthenticationException::tokenGenerationFailed($e->getMessage());
        }
    }

    /**
     * Get the OAuth scopes for application tokens
     */
    protected function getScopes(): string
    {
        return $this->scopes;
    }

    /**
     * Get the cache key for storing the token
     */
    protected function getCacheKey(): string
    {
        return 'ebay_api_app_token_'.md5($this->appId.$this->environment->value);
    }

    /**
     * Clear the cached token
     */
    public function clearToken(): void
    {
        Cache::forget($this->getCacheKey());
    }
}
