<?php

namespace Millennium\Cache\Drivers;

use Millennium\Cache\Interfaces\CacheDriver;
use Millennium\Cache\Exceptions\Memcache\MemcacheDriverNotSupportedException;

class MemcacheDriver implements CacheDriver
{
    
    /**
     *
     * @var \Memcache
     */
    private $memcache;
    
    /**
     *
     * @var integer
     */
    private $expire;
    
    public function __construct(array $options = null)
    {
        if (!class_exists('Memcache')) {
            throw new MemcacheDriverNotSupportedException;
        }
        $this->memcache = new \Memcache;
        $this->memcache->connect('127.0.0.1', 11211);
        $this->expire = isset($options['expire']) && ctype_digit($options['expire']) ? $options['expire'] : 3600;
    }
    
    public function fetch($key)
    {
        if (null != $this->memcache->get($key)) {
            return $this->memcache->get($key);
        }
        return false;
    }

    public function remove($key)
    {
        return $this->memcache->delete($key);
    }

    public function store($key, $data, $expire = null)
    {
        return $this->memcache->set($key, $data, MEMCACHE_COMPRESSED, $expire ? $expire : time() + $this->expire);
    }

}
