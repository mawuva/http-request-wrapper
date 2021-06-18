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
     * @param string $requestUri
     * @param array $options
     *
     * @return GuzzleHttp\Client
     */
    public function send($method, $requestUri, $options = [])
    {
        return $this ->client->send($this ->makeRequest($method, $requestUri), $options);
    }
}
