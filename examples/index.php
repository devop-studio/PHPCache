<?php

require_once './vendor/autoload.php';

//use Millennium\Drivers\APCDriver;
//use Millennium\Drivers\ArrayDriver;
//use Millennium\Drivers\FileStorageDriver;
use Millennium\Drivers\MemcacheDriver;

try {
//    $driver = new Millennium\Drivers\ArrayDriver();
//    $directory = realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'cache';
//    $driver = new FileStorageDriver(array('path' => $directory));
//    $driver = new APCDriver();
    $driver = new MemcacheDriver;
    $cache = new Millennium\Cache($driver);
    // store some data
    
    $data = new stdClass();
    $data->firstName = "Zlatko";
    
    $cache->store("data", array($data->firstName));
    
    $data->firstName = "Mr. Hristov";
    // var_dump stored data
    var_dump($cache->fetch("data"));
} catch (\Exception $ex) {
    echo "<pre>", print_r(array($ex->getCode(), $ex->getMessage())), "</pre>";
}
