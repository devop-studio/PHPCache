<?php

namespace Millennium\Cache\Drivers;

use Millennium\Cache\Interfaces\CacheDriver;

class APCDriver implements CacheDriver
{

    private $isAPCu;

    public function __construct()
    {
        if (!function_exists('apc_exists') && !function_exists('apcu_exists')) {
            throw new \Millennium\Cache\Exceptions\DriverNotFoundException('APC(u) not installed on your system');
        }
        $this->isAPCu = (bool) function_exists('apcu_exists');
    }

    public function fetch($key)
    {
        return $this->isAPCu ? apcu_fetch($key) : apc_fetch($key);
    }

    public function remove($key)
    {
        return $this->isAPCu ? apcu_delete($key) : apc_delete($key);
    }

    public function store($key, $data, $expire = 0)
    {
        return $this->isAPCu ? apcu_store($key, $data, $expire) : apc_store($key, $data, $expire);
    }

}
