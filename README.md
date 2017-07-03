# Run Dusk tests in Safari

[![Latest Version on Packagist](https://img.shields.io/packagist/v/appstract/laravel-dusk-safari.svg?style=flat-square)](https://packagist.org/packages/appstract/laravel-dusk-safari)
[![Total Downloads](https://img.shields.io/packagist/dt/appstract/laravel-dusk-safari.svg?style=flat-square)](https://packagist.org/packages/appstract/laravel-dusk-safari)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/appstract/laravel-dusk-safari/master.svg?style=flat-square)](https://travis-ci.org/appstract/laravel-dusk-safari)

This package allows you to use the built-in Safari WebDriver of macOS, so you don't need Selenium to run Dusk tests in Safari.

This requires Safari 10 or higher.

## Installation

You can install the package via composer:

``` bash
composer require appstract/laravel-dusk-safari
```

## Usage

Make sure to enable Remote Automation in the Safari menu bar:

```Develop > Allow Remote Automation.```

Add the ``SupportsSafari`` trait to your DuskTestCase:
```php
use Appstract\DuskSafari\SupportsSafari;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication, SupportsSafari;
```

Now you can start the server in the ```prepare``` method:
```php
public static function prepare()
{
    static::startSafariDriver();
}
```

Instruct Dusk to use Safari by changing ```DesiredCapabilities::chrome()```
to ```DesiredCapabilities::safari()``` in the Driver method:

```php
protected function driver()
{
    return RemoteWebDriver::create(
        'http://localhost:9515', DesiredCapabilities::safari()
    );
}
```

## Contributing

Contributions are welcome, [thanks to y'all](https://github.com/appstract/laravel-blade-directives/graphs/contributors) :)

## About Appstract

Appstract is a small team from The Netherlands. We create (open source) tools for webdevelopment and write about related subjects on [Medium](https://medium.com/appstract). You can [follow us on Twitter](https://twitter.com/teamappstract), [buy us a beer](https://www.paypal.me/teamappstract/10) or [support us on Patreon](https://www.patreon.com/appstract).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
