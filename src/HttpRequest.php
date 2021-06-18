<?php

namespace Mawuekom\HttpRequestWrapper;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class HttpRequest
{
    private $client;
    private $baseUri;

    /**
     * Create new instance
     *
     * @param string $baseUri
     * 
     * @return void
     */
    public function __construct($baseUri = '')
    {
        $this ->baseUri = $baseUri;

        $this ->client = new Client([
            'base_uri' =>$this ->baseUri
        ]);
    }

    /**
     * Make request before send it
     *
     * @param string $method
     * @param string $requestUrl
     *
     * @return GuzzleHttp\Psr7\Request
     */
    private function makeRequest($method, $requestUrl)
    {
        return new Request($method, $requestUrl);
    }

    /**
     * Send request after building
     *
     * @param string $method
     * @param string $requestUrl
     * @param array $options
     *
     * @return GuzzleHttp\Client|mixed
     */
    public function send($method, $requestUrl, $options = [])
    {
        return $this ->client->send($this ->makeRequest($method, $requestUrl), $options);
    }

    /**
     * Perform GET request
     *
     * @param string $requestUrl
     * @param array $options
     *
     * @return GuzzleHttp\Client|mixed
     */
    public function get($requestUrl, $options = [])
    {
        return $this ->client->send($this ->makeRequest('GET', $requestUrl), $options);
    }

    /**
     * Perform POST request
     *
     * @param string $requestUrl
     * @param array $formParams
     * @param array $options
     *
     * @return GuzzleHttp\Client|mixed
     */
    public function post($requestUrl, $formParams = [], $options = [])
    {
        $options['form_params'] = $formParams;

        return $this ->client->send($this ->makeRequest('POST', $requestUrl), $options);
    }

    /**
     * Perform PUT request
     *
     * @param string $requestUrl
     * @param array $formParams
     * @param array $options
     *
     * @return GuzzleHttp\Client|mixed
     */
    public function put($requestUrl, $formParams = [], $options = [])
    {
        $options['form_params'] = $formParams;

        return $this ->client->send($this ->makeRequest('PUT', $requestUrl), $options);
    }

    /**
     * Perform PATCH request
     *
     * @param string $requestUrl
     * @param array $formParams
     * @param array $options
     *
     * @return GuzzleHttp\Client|mixed
     */
    public function patch($requestUrl, $formParams = [], $options = [])
    {
        $options['form_params'] = $formParams;

        return $this ->client->send($this ->makeRequest('PATCH', $requestUrl), $options);
    }

    /**
     * Perform DELETE request
     *
     * @param string $requestUrl
     * @param array $options
     *
     * @return GuzzleHttp\Client|mixed
     */
    public function delete($requestUrl, $options = [])
    {
        return $this ->client->send($this ->makeRequest('DELETE', $requestUrl), [], $options);
    }
}
