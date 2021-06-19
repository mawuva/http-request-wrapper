# HTTP Request Wrapper

[![License](https://poser.pugx.org/mawuekom/http-request-wrapper/license)](https://packagist.org/packages/mawuekom/http-request-wrapper)

This package provide a simple and lighter wrapper around [Guzzle HTTP client](https://docs.guzzlephp.org/en/stable/index.html)

## Installation

You can install the package via composer:

```bash
composer require mawuekom/http-request-wrapper
```

## Usage

```php
// Simple usage

use Mawuekom\HttpRequestWrapper\HttpRequest;

$request = new HttpRequest('http://httpbin.org');
$response = $request ->send('GET', 'get');

echo $response ->getBody();
```

### Using custom methods

```php
// Simple usage

use Mawuekom\HttpRequestWrapper\HttpRequest;

$request = new HttpRequest('http://httpbin.org');
$response = $request ->get('get');

// You can also override default base URI
$response = $request ->get('http://httpbin.org/get');

$request ->post('http://httpbin.org/post');
$request ->put('http://httpbin.org/put');
$request ->patch('http://httpbin.org/patch');
$request ->delete('http://httpbin.org/delete');
```

You can also use helper

```php
use Mawuekom\HttpRequestWrapper\Helpers\HttpRequestHelper;

class Test
{
    use HttpRequestHelper;

    private $baseUri = 'http://httpbin.org/';

    public function data()
    {
        $res = $this ->makeRequest('GET', 'get');

        return $res ->getBody();
    }

    public function getData()
    {
        $res = $this ->get('get');

        return $res ->getBody();
    }
}
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

