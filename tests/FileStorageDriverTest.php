<?php

class FilestorageCacheDriverTest extends PHPUnit_Framework_TestCase
{

    public function testCacheStore()
    {
        try {
            $cache = new Millennium\Cache\Cache(new \Millennium\Cache\Drivers\FileStorageDriver(array('path' => sys_get_temp_dir())));
            $cache->store("file_storage_cache_test", array(1,2,3));
            $this->assertNotEmpty($cache->fetch("file_storage_cache_test"));
            $cache->remove("file_storage_cache_test");
        } catch (\Millennium\Cache\Exceptions\DriverNotFoundException $ex) {
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function testCacheNotExists()
    {
        try {
            $cache = new Millennium\Cache\Cache(new \Millennium\Cache\Drivers\FileStorageDriver(array('path' => sys_get_temp_dir())));
            $this->assertFalse($cache->fetch("file_storage_cache_test_not_exists"));
        } catch (\Millennium\Cache\Exceptions\DriverNotFoundException $ex) {
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}