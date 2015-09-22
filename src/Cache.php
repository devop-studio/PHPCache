<?php

namespace Millennium\Cache;

use Millennium\Cache\Exceptions\DriverNotFoundException;
use Millennium\Cache\Exceptions\DriverMisconfiguredException;

class Cache
{

    /**
     *
     * @var Interfaces\CacheDriverInterface
     */
    private $driver;

    public function __construct($driver = null)
    {
        if (null === $driver) {
            throw new DriverMisconfiguredException;
        }
        if (!$driver instanceof Interfaces\CacheDriverInterface) {
            throw new DriverNotFoundException;
        }
        $this->driver = $driver;
    }

    /**
     * 
     * @return Interfaces\CacheDriverInterface
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * 
     * @param string $key
     * 
     * @return array
     */
    public function fetch($key)
    {
        return $this->getDriver()->fetch($key);
    }

    /**
     * 
     * @param string $key
     * @param array $data
     * 
     * @return boolean
     */
    public function store($key, $data)
    {
        return $this->getDriver()->store($key, $data);
    }

    /**
     * 
     * @param string $key
     * 
     * @return boolean
     */
    public function remove($key)
    {
        return $this->getDriver()->remove($key);
    }

}
