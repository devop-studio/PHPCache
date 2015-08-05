<?php

use Millennium\Cache\Cache;
// cache drivers
use Millennium\Cache\Drivers\APCDriver;
use Millennium\Cache\Drivers\ArrayDriver;
use Millennium\Cache\Drivers\MemcacheDriver;
use Millennium\Cache\Drivers\FileStorageDriver;

class CacheTest extends PHPUnit_Framework_TestCase
{

    public function testAPCDriverCache()
    {
        $cache = new Cache(new APCDriver());
        $cache->store("test", array(1, 2, 3));
        var_dump($cache->fetch("test"));
        $this->assertNotEmpty($cache->fetch("test"));
        $cache->remove("test");
        $this->assertNull($cache->fetch("test"));
    }

    public function testArrayDriverCache()
    {
        $cache = new Cache(new ArrayDriver());
        $cache->store("test", array(1, 2, 3));
        $this->assertNotEmpty($cache->fetch("test"));
        $cache->remove("test");
        $this->assertNull($cache->fetch("test"));
    }

    public function testMemcacheDriverCache()
    {
        $cache = new Cache(new MemcacheDriver());
        $cache->store("test", array(1, 2, 3));
        $this->assertNotEmpty($cache->fetch("test"));
        $cache->remove("test");
        $this->assertNull($cache->fetch("test"));
    }

    public function testFileStorageDriverCache()
    {
        $cache = new Cache(new FileStorageDriver());
        $cache->store("test", array(1, 2, 3));
        $this->assertNotEmpty($cache->fetch("test"));
        $cache->remove("test");
        $this->assertNull($cache->fetch("test"));
    }

}
