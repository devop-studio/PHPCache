<?php

class APCCacheDriverTest extends PHPUnit_Framework_TestCase
{
    public function testCacheStore()
    {
        try {
            $cache = new Millennium\Cache\Cache(new \Millennium\Cache\Drivers\APCDriver());
            $this->assertNotEmpty($cache->fetch('apc_cache_test'));
            $cache->remove('apc_cache_test');
        } catch (\Millennium\Cache\Exceptions\DriverNotFoundException $ex) {
            echo $ex->getMessage();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function testCacheNotExists()
    {
        try {
            $cache = new Millennium\Cache\Cache(new \Millennium\Cache\Drivers\APCDriver());
            $this->assertFalse($cache->fetch('apc_cache_test_not_exists'));
        } catch (\Millennium\Cache\Exceptions\DriverNotFoundException $ex) {
            echo $ex->getMessage();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
