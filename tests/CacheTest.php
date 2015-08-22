<?php

use Millennium\Cache\Cache;
// cache drivers
use Millennium\Cache\Drivers\ArrayDriver;
use Millennium\Cache\Drivers\MemcacheDriver;
use Millennium\Cache\Drivers\FileStorageDriver;

class CacheTest extends PHPUnit_Framework_TestCase
{

    public function testArrayDriverCache()
    {
        $cache = new Cache(new ArrayDriver());
        $cache->store("test", array(1, 2, 3));
        $this->assertNotEmpty($cache->fetch("test"));
        $cache->remove("test");
        $this->assertFalse($cache->fetch("test"));
    }

    public function testMemcacheDriverCache()
    {
        $cache = new Cache(new MemcacheDriver());
        $cache->store("test", array(1, 2, 3));
        $this->assertNotEmpty($cache->fetch("test"));
        $cache->remove("test");
        $this->assertFalse($cache->fetch("test"));
    }

    public function testFileStorageDriverCache()
    {
        $cache = new Cache(new FileStorageDriver(array('path' => getcwd() . '/cache')));
        $cache->store("test", array(1, 2, 3));
        $this->assertNotEmpty($cache->fetch("test"));
        $cache->remove("test");
        $this->assertFalse($cache->fetch("test"));
    }

}
