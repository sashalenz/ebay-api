<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Exceptions\AuthenticationException;
use Sashalenz\EbayApi\Exceptions\RequestException;
use Sashalenz\EbayApi\Exceptions\ValidationException;
use Sashalenz\EbayApi\Types\Response;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Base Request class
 *
 * Abstract class that all API request classes should extend.
 * Provides the structure for defining and executing API requests.
 */
abstract class Request
{
    protected EbayClient $client;

    /**
     * Create a new Request instance
     *
     * @param  EbayClient|null  $client  The eBay API client (auto-resolved if null)
     */
    public function __construct(?EbayClient $client = null)
    {
        $this->client = $client ?? app(EbayClient::class);
    }

    /**
     * Create a new Request instance (static factory)
     *
     * @param  mixed  ...$params  Constructor parameters (excluding client)
     */
    public static function make(...$params): static
    {
        return new static(null, ...$params);
    }

    /**
     * Get the API endpoint path
     *
     * @return string The endpoint path (e.g., '/sell/inventory/v1/inventory_item/SKU123')
     */
    abstract public function endpoint(): string;

    /**
     * Get the HTTP method for this request
     *
     * @return string HTTP method (GET, POST, PUT, DELETE)
     */
    abstract public function method(): string;

    /**
     * Get query parameters for the request
     *
     * @return array Query parameters
     */
    public function query(): array
    {
        return [];
    }

    /**
     * Get the request body
     *
     * @return array Request body data
     */
    public function body(): array
    {
        return [];
    }

    /**
     * Get additional headers for this request
     *
     * @return array Additional headers
     */
    public function headers(): array
    {
        return [];
    }

    /**
     * Validate the request before sending
     *
     * Override this method in child classes to implement custom validation
     *
     * @return array<string> Array of validation errors (empty if valid)
     */
    protected function validate(): array
    {
        return [];
    }

    /**
     * Send the request
     *
     * @throws AuthenticationException
     * @throws RequestException
     * @throws ValidationException
     */
    public function send(): Response
    {
        // Validate request before sending
        $errors = $this->validate();
        if (! empty($errors)) {
            throw ValidationException::withErrors($errors);
        }

        $method = strtoupper($this->method());
        $endpoint = $this->endpoint();

        $response = match ($method) {
            'GET' => $this->client->get($endpoint, $this->query(), $this->headers()),
            'POST' => $this->client->post($endpoint, $this->body(), $this->headers()),
            'PUT' => $this->client->put($endpoint, $this->body(), $this->headers()),
            'DELETE' => $this->client->delete($endpoint, $this->headers()),
            default => throw new RequestException('Unsupported HTTP method: '.$method),
        };

        return new Response($response);
    }

    /**
     * Get the Data class for automatic response mapping
     *
     * Override this method to enable automatic mapping of responses to Data objects
     *
     * @return class-string<Data>|null
     */
    public function dto(): ?string
    {
        return null;
    }

    /**
     * Get the key to extract from response before mapping to Data
     *
     * Override this method if the data you want is nested in the response
     *
     * @return string|null Key path (e.g., 'data', 'items', 'inventoryItems')
     */
    public function dtoKey(): ?string
    {
        return null;
    }

    /**
     * Send the request and automatically map response to Data object(s)
     *
     * @template T of Data
     *
     * @param  class-string<T>|null  $dataClass  Optional Data class to override dto()
     * @param  string|null  $key  Optional key to override dtoKey()
     * @return T|DataCollection<int, T>
     *
     * @throws AuthenticationException
     * @throws RequestException
     */
    public function asData(?string $dataClass = null, ?string $key = null): Data|DataCollection
    {
        $response = $this->send();

        $dtoClass = $dataClass ?? $this->dto();
        $dtoKey = $key ?? $this->dtoKey();

        if ($dtoClass === null) {
            throw new \LogicException(
                'No Data class specified. Either override dto() method or pass $dataClass parameter.'
            );
        }

        return $response->data($dtoClass, $dtoKey);
    }

    /**
     * Send the request and map response to a collection of Data objects
     *
     * @template T of Data
     *
     * @param  class-string<T>|null  $dataClass  Optional Data class to override dto()
     * @param  string|null  $key  Optional key to override dtoKey()
     * @return DataCollection<int, T>
     *
     * @throws AuthenticationException
     * @throws RequestException
     */
    public function asCollection(?string $dataClass = null, ?string $key = null): DataCollection
    {
        $response = $this->send();

        $dtoClass = $dataClass ?? $this->dto();
        $dtoKey = $key ?? $this->dtoKey();

        if ($dtoClass === null) {
            throw new \LogicException(
                'No Data class specified. Either override dto() method or pass $dataClass parameter.'
            );
        }

        return $response->collect($dtoClass, $dtoKey);
    }

    /**
     * Get the client instance
     */
    public function getClient(): EbayClient
    {
        return $this->client;
    }
}
