# PHPCache
Implements Cache Drivers (apc, memcache, xcache and sample files)

| SensioLabs Insight | Travis CI | Scrutinizer CI|
| ------------------------|-------------|-----------------|
|[![SensioLabsInsight](https://insight.sensiolabs.com/projects/3455db82-ebd0-4767-852b-15e96b3aca74/mini.png)](https://insight.sensiolabs.com/projects/3455db82-ebd0-4767-852b-15e96b3aca74)|[![Build Status](https://travis-ci.org/desertknight/symfony2-extensions.svg?branch=master)](https://travis-ci.org/desertknight/symfony2-extensions)|[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/desertknight/PHPCache/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/desertknight/PHPCache/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/desertknight/PHPCache/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/desertknight/PHPCache/?branch=master) [![Build Status](https://scrutinizer-ci.com/g/desertknight/PHPCache/badges/build.png?b=master)](https://scrutinizer-ci.com/g/desertknight/PHPCache/build-status/master)

[![Dependency Status](https://www.versioneye.com/user/projects/5562f6e3366466001fb30000/badge.svg?style=flat)](https://www.versioneye.com/user/projects/5562f6e3366466001fb30000) [![Latest Stable Version](https://poser.pugx.org/millennium/phpcache/v/stable)](https://packagist.org/packages/millennium/phpcache) [![Total Downloads](https://poser.pugx.org/millennium/phpcache/downloads)](https://packagist.org/packages/millennium/phpcache) [![Latest Unstable Version](https://poser.pugx.org/millennium/phpcache/v/unstable)](https://packagist.org/packages/millennium/phpcache) [![License](https://poser.pugx.org/millennium/phpcache/license)](https://packagist.org/packages/millennium/phpcache)


## Requirements:
-    "php": ">=5.3.0"

## Suggest
-   "php-apc": "*"
-   "php-memcache": "*"

## Features:
- *Maybe some refactoring and optimizing*
- *Adding more Unit Tests*

## Installation and configuration:

Install with [Composer](http://packagist.org), run:

```sh
composer require millennium/phpcache
```

## Usage examples:

```php
<?php

require './vendor/autoload.php';

use Millennium\Cache\Cache;
use Millennium\Cache\Drivers\MemcacheDriver;

$test = array('1','2','3');

$driverTest1 = new Cache(new MemcacheDriver(array()));
$driverTest1->store("test", $test);
var_dump($driverTest1->fetch("test"));
```

## Contributions

Contributions to PHPCache are welcome via pull requests.


## License

PHPCache was created by [Zlatko Hristov](http://z-latko.info) and released under the MIT License.
