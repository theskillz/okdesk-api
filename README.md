# OkDesk PHP API v1

[![Build Status](https://travis-ci.org/theskillz/okdesk-api.svg?branch=master)](https://travis-ci.org/theskillz/okdesk-api)
[![Packagist](https://img.shields.io/packagist/v/theskillz/okdesk-api.svg)](https://packagist.org/packages/theskillz/okdesk-api)

This is an php client for the [OkDesk](http://okdesk.ru) API v1.
## Quick Start
```php
require __DIR__ . '/vendor/autoload.php';
use \OkDesk\Api;

$api = new Api("your_okdesk_domain", "your_okdesk_token");

$issue = $api->issues->view(123);
$companiesList = $api->companies->all(['search_string' => 'ACME Ltd']);

```
## Installation

To integrate this library into your application, use [Composer](https://getcomposer.org).
 can be installed using [Composer](https://getcomposer.org) by running the following command:

```bash
php composer.phar require theskillz/okdesk-api
```