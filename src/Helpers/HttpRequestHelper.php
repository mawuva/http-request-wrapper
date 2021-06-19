<?php

namespace Mawuekom\HttpRequestWrapper\Helpers;

use Mawuekom\HttpRequestWrapper\HttpRequest;

trait HttpRequestHelper
{
    /**
     * Undocumented function
     *
     * @param string $method
     * @param string $requestUrl
     * @param array $options
     *
     * @return mixed
     */
    public function makeRequest($method, $requestUrl, $options = [])
    {
        return $this ->buildRequest() 
                     ->send($method, $requestUrl, $options);
    }

    /**
     * Perform GET request
     *
     * @param string $requestUrl
     * @param array $options
     *
     * @return mixed
     */
    public function get($requestUrl, $options = [])
    {
        return $this ->buildRequest() 
                     ->get($requestUrl, $options);
    }

    /**
     * Perform POST request
     *
     * @param string $requestUrl
     * @param array $formParams
     * @param array $options
     *
     * @return mixed
     */
    public function post($requestUrl, $formParams = [], $options = [])
    {
        return $this ->buildRequest() 
                     ->post($requestUrl, $formParams, $options);
    }

    /**
     * Perform PUT request
     *
     * @param string $requestUrl
     * @param array $formParams
     * @param array $options
     *
     * @return mixed
     */
    public function put($requestUrl, $formParams = [], $options = [])
    {
        return $this ->buildRequest() 
                     ->put($requestUrl, $formParams, $options);
    }

    /**
     * Perform PATCH request
     *
     * @param string $requestUrl
     * @param array $formParams
     * @param array $options
     *
     * @return mixed
     */
    public function patch($requestUrl, $formParams = [], $options = [])
    {
        return $this ->buildRequest() 
                     ->patch($requestUrl, $formParams, $options);
    }

    /**
     * Perform DELETE request
     *
     * @param string $requestUrl
     * @param array $options
     *
     * @return mixed
     */
    public function delete($requestUrl, $options = [])
    {
        return $this ->buildRequest() 
                     ->delete($requestUrl, $options);
    }

    /**
     * Instantiate HTTP Request class
     * 
     * @return Mawuekom\HttpRequestWrapper\HttpRequest
     */
    private function buildRequest()
    {
        return property_exists($this, 'baseUri') 
                ? new HttpRequest($this ->baseUri) 
                : new HttpRequest();
    }
}