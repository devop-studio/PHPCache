<?php

namespace Millennium;

use Millennium\Exceptions\DriverNotFoundException;
use Millennium\Exceptions\DriverMisconfiguredException;

class Cache
{

    /**
     *
     * @var Interfaces\CacheDriver
     */
    private $driver;

    public function __construct($driver = null)
    {
        if (null === $driver) {
            throw new DriverMisconfiguredException;
        }
        if (!$driver instanceof Interfaces\CacheDriver) {
            throw new DriverNotFoundException;
        }
        $this->driver = $driver;
    }

    /**
     * 
     * @return Interfaces\CacheDriver
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
