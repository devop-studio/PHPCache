<?php

error_reporting(E_ALL);

ini_set('display_errors', 'On');

require './vendor/autoload.php';

use Millennium\Cache\Cache;
use Millennium\Cache\Drivers\ArrayDriver;
use Millennium\Cache\Drivers\MemcacheDriver;
use Millennium\Cache\Drivers\FileStorageDriver;

$test = array('1','2','3');

// Memcache Test
$driverTest1 = new Cache(new \Millennium\Cache\Drivers\APCDriver());
$driverTest1->store("test", $test);
var_dump($driverTest1->fetch("test"));

// XCache Test
//$driverTest2 = new Cache(new \Millennium\Cache\Drivers\XCacheDriver());
//$driverTest2->store("test", $test);
//var_dump($driverTest2->fetch("test"));

// APC(u) driver
$driverTest3 = new Cache(new \Millennium\Cache\Drivers\APCDriver());
$driverTest3->store("test", $test);
var_dump($driverTest3->fetch("test2"));
var_dump($driverTest3->fetch("test"));