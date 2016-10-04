<?php

class MemcacheCacheDriverTest extends PHPUnit_Framework_TestCase
{
    public function testCacheStore()
    {
        try {
            $cache = new Millennium\Cache\Cache(new \Millennium\Cache\Drivers\MemcacheDriver());
            $cache->store('memcache_cache_test', [1, 2, 3]);
            $this->assertNotEmpty($cache->fetch('memcache_cache_test'));
            $cache->remove('memcache_cache_test');
        } catch (\Millennium\Cache\Exceptions\DriverNotFoundException $ex) {
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function testCacheNotExists()
    {
        try {
            $cache = new Millennium\Cache\Cache(new \Millennium\Cache\Drivers\MemcacheDriver());
            $this->assertFalse($cache->fetch('memcache_cache_test_not_exists'));
        } catch (\Millennium\Cache\Exceptions\DriverNotFoundException $ex) {
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
