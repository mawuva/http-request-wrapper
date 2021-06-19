<?php

namespace Mawuekom\HttpRequestWrapper\Helpers;

use Mawuekom\HttpRequestWrapper\HttpRequest;

trait HttpRequestHelper
{
    /**
     * Undocumented function
     *
     * @param [type] $method
     * @param [type] $requestUrl
     * @param [type] $options
     *
     * @return void
     */
    public function makeRequest($method, $requestUrl, $options)
    {
        if (property_exists($this, 'baseUri')) {
            $request = new HttpRequest($this ->baseUri);
        }

        $request = property_exists($this, 'baseUri') 
                    ? new HttpRequest($this ->baseUri) 
                    : new HttpRequest();

        return $request ->send($method, $requestUrl, $options);
    }
}