<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException as GuzzleRequestException;
use Psr\Http\Message\ResponseInterface;
use Sashalenz\EbayApi\Client\Auth\ApplicationToken;
use Sashalenz\EbayApi\Client\Auth\AuthInterface;
use Sashalenz\EbayApi\Client\Auth\UserToken;
use Sashalenz\EbayApi\Enums\ContentLanguage;
use Sashalenz\EbayApi\Enums\Environment;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Exceptions\AuthenticationException;
use Sashalenz\EbayApi\Exceptions\RequestException;

/**
 * eBay API HTTP Client
 *
 * Handles all HTTP requests to the eBay API with automatic authentication,
 * proper headers, and error handling.
 */
class EbayClient
{
    protected Client $httpClient;

    protected AuthInterface $auth;

    protected ?UserToken $userToken = null;

    protected Environment $environment;

    protected MarketplaceId $marketplaceId;

    protected ContentLanguage $contentLanguage;

    /**
     * Create a new eBay API Client instance
     *
     * @param  string  $appId  eBay Application ID
     * @param  string  $certId  eBay Certificate ID
     * @param  Environment  $environment  API environment
     * @param  MarketplaceId  $marketplaceId  Default marketplace
     * @param  ContentLanguage  $contentLanguage  Default content language
     * @param  int  $timeout  Request timeout in seconds
     * @param  int  $tokenCacheTtl  Token cache TTL in seconds
     * @param  string  $scopes  OAuth scopes
     * @param  Client|null  $httpClient  Custom HTTP client (for testing)
     */
    public function __construct(
        string $appId,
        string $certId,
        Environment $environment,
        MarketplaceId $marketplaceId,
        ContentLanguage $contentLanguage,
        int $timeout = 30,
        int $tokenCacheTtl = 3300,
        string $scopes = 'https://api.ebay.com/oauth/api_scope',
        ?Client $httpClient = null
    ) {
        $this->environment = $environment;
        $this->marketplaceId = $marketplaceId;
        $this->contentLanguage = $contentLanguage;

        $this->auth = new ApplicationToken($appId, $certId, $environment, $tokenCacheTtl, $scopes);

        $this->httpClient = $httpClient ?? new Client([
            'base_uri' => $environment->apiBaseUrl(),
            'timeout' => $timeout,
            'http_errors' => false, // We'll handle errors manually
        ]);
    }

    /**
     * Send a GET request
     *
     * @param  string  $endpoint  API endpoint path
     * @param  array  $query  Query parameters
     * @param  array  $headers  Additional headers
     *
     * @throws AuthenticationException
     * @throws RequestException
     */
    public function get(string $endpoint, array $query = [], array $headers = []): ResponseInterface
    {
        return $this->request('GET', $endpoint, [
            'query' => $query,
            'headers' => $headers,
        ]);
    }

    /**
     * Send a POST request
     *
     * @param  string  $endpoint  API endpoint path
     * @param  array  $body  Request body
     * @param  array  $headers  Additional headers
     *
     * @throws AuthenticationException
     * @throws RequestException
     */
    public function post(string $endpoint, array $body = [], array $headers = []): ResponseInterface
    {
        return $this->request('POST', $endpoint, [
            'json' => $body,
            'headers' => $headers,
        ]);
    }

    /**
     * Send a PUT request
     *
     * @param  string  $endpoint  API endpoint path
     * @param  array  $body  Request body
     * @param  array  $headers  Additional headers
     *
     * @throws AuthenticationException
     * @throws RequestException
     */
    public function put(string $endpoint, array $body = [], array $headers = []): ResponseInterface
    {
        return $this->request('PUT', $endpoint, [
            'json' => $body,
            'headers' => $headers,
        ]);
    }

    /**
     * Send a DELETE request
     *
     * @param  string  $endpoint  API endpoint path
     * @param  array  $headers  Additional headers
     *
     * @throws AuthenticationException
     * @throws RequestException
     */
    public function delete(string $endpoint, array $headers = []): ResponseInterface
    {
        return $this->request('DELETE', $endpoint, [
            'headers' => $headers,
        ]);
    }

    /**
     * Send a request to the eBay API
     *
     * @param  string  $method  HTTP method
     * @param  string  $endpoint  API endpoint path
     * @param  array  $options  Request options
     *
     * @throws AuthenticationException
     * @throws RequestException
     */
    protected function request(string $method, string $endpoint, array $options = []): ResponseInterface
    {
        $options['headers'] = array_merge(
            $this->getDefaultHeaders(),
            $options['headers'] ?? []
        );

        try {
            $response = $this->httpClient->request($method, $endpoint, $options);

            // Check if the response indicates an error
            if ($response->getStatusCode() >= 400) {
                throw RequestException::fromResponse($response);
            }

            return $response;
        } catch (GuzzleRequestException $e) {
            if ($e->hasResponse()) {
                throw RequestException::fromResponse($e->getResponse());
            }

            throw RequestException::networkError($e->getMessage());
        } catch (GuzzleException $e) {
            throw RequestException::networkError($e->getMessage());
        }
    }

    /**
     * Get default headers for all requests
     *
     * @throws AuthenticationException
     */
    protected function getDefaultHeaders(): array
    {
        // Use UserToken if set, otherwise use ApplicationToken
        $authToken = $this->userToken?->getToken() ?? $this->auth->getToken();

        return [
            'Authorization' => 'Bearer '.$authToken,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'X-EBAY-C-MARKETPLACE-ID' => $this->marketplaceId->value,
            'Content-Language' => $this->contentLanguage->value,
        ];
    }

    /**
     * Set User OAuth Token for user-specific API calls
     *
     * Required for APIs like Post-Order, Identity that need user authorization.
     * Use this when you have obtained a user's OAuth token through authorization flow.
     */
    public function setUserToken(UserToken $userToken): self
    {
        $this->userToken = $userToken;

        return $this;
    }

    /**
     * Clear User OAuth Token (revert to Application Token)
     */
    public function clearUserToken(): self
    {
        $this->userToken = null;

        return $this;
    }

    /**
     * Check if User Token is set
     */
    public function hasUserToken(): bool
    {
        return $this->userToken !== null;
    }

    /**
     * Get the current environment
     */
    public function getEnvironment(): Environment
    {
        return $this->environment;
    }

    /**
     * Get the current marketplace ID
     */
    public function getMarketplaceId(): MarketplaceId
    {
        return $this->marketplaceId;
    }

    /**
     * Get the current content language
     */
    public function getContentLanguage(): ContentLanguage
    {
        return $this->contentLanguage;
    }

    /**
     * Clear the cached authentication token
     */
    public function clearAuthToken(): void
    {
        $this->auth->clearToken();
    }
}
