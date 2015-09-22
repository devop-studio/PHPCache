<?php

class XCacheCacheDriverTest extends PHPUnit_Framework_TestCase
{

    public function testCacheStore()
    {
        try {
            $cache = new Millennium\Cache\Cache(new \Millennium\Cache\Drivers\XCacheDriver());
            $cache->store("xcache_cache_test", array(1,2,3));
            $this->assertNotEmpty($cache->fetch("xcache_cache_test"));
            $cache->remove("xcache_cache_test");
        } catch (\Millennium\Cache\Exceptions\DriverNotFoundException $ex) {
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function testCacheNotExists()
    {
        try {
            $cache = new Millennium\Cache\Cache(new \Millennium\Cache\Drivers\XCacheDriver());
            $this->assertFalse($cache->fetch("xcache_cache_test_not_exists"));
        } catch (\Millennium\Cache\Exceptions\DriverNotFoundException $ex) {
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}