## php-string

This librairy provides utilities function to ease string manipulation

[![Build Status](https://travis-ci.org/hugsbrugs/php-string.svg?branch=master)](https://travis-ci.org/hugsbrugs/php-string)
[![Coverage Status](https://coveralls.io/repos/github/hugsbrugs/php-string/badge.svg?branch=master)](https://coveralls.io/github/hugsbrugs/php-string?branch=master)

## Install

Install package with composer
```
composer require hugsbrugs/php-string
```

In your PHP code, load library
```php
require_once __DIR__ . '/../vendor/autoload.php';
use Hug\HString\HString as HString;
```
Note: I couldn't use String as namespace because it's a PHP reserved word so it's why namespace is HString ...

## Usage

Replace the last occurrence of a string
```php
$string = HString::str_replace_last($search, $replace, $subject);
```

Checks whether a string starts with given chars
```php
$bool = HString::starts_with($haystack, $needle);
```

Checks whether a string ends with given chars
```php
$bool = HString::ends_with($haystack, $needle);
```

## Unit Tests

```
composer exec phpunit
```