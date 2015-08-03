<?php

namespace Millennium\Drivers;

use Millennium\Interfaces\CacheDriver;

class ArrayDriver implements CacheDriver
{

    /**
     *
     * @var \ArrayObject
     */
    private $storage;

    /**
     * @var integer
     */
    private $expire;
    
    /**
     * 
     * @param array $options
     */
    public function __construct(array $options = null)
    {
        $this->expire = isset($options['expire']) && ctype_digit($options['expire']) ? $options['expire'] : 3600;
    }
    
    /**
     * 
     * @param string $key
     * 
     * @return boolean
     */
    public function fetch($key)
    {
        if (isset($this->storage[$key])) {
            return $this->storage[$key];
        }
        return false;
    }

    /**
     * 
     * @param string $key
     * 
     * @return boolean
     */
    public function remove($key)
    {
        if (isset($this->storage[$key])) {
            unset($this->storage[$key]);
            return true;
        }
        return false;
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
        return $this->storage[$key] = $data;
    }

}
