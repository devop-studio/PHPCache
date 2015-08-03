<?php

namespace Millennium\Drivers;

use Millennium\Interfaces\CacheDriver;

class APCDriver implements CacheDriver
{

    /**
     *
     * @var boolean
     */
    private $isAPCu;
    
    /**
     *
     * @var integer
     */
    private $expire;

    /**
     * 
     * @param array $options
     * 
     * @throws \Millennium\Exceptions\APC\APCDriverNotSupportedException
     */
    public function __construct(array $options = null)
    {
        if (false === function_exists('apc_fetch') && false === function_exists('apcu_fetch')) {
            throw new \Millennium\Exceptions\APC\APCDriverNotSupportedException;
        }
        $this->isAPCu = function_exists('apcu_fetch') ? true : false;
        $this->expire = isset($options['expire']) && ctype_digit($options['expire']) ? $options['expire'] : 3600;
    }

    public function store($key, $data)
    {
        return $this->isAPCu ? apcu_store($key, $data, time() + $this->expire) : apc_store($key, $data, time() + $this->expire);
    }

    /**
     * 
     * @param string $key
     * 
     * @return boolean
     */
    public function fetch($key)
    {
        if ($this->isAPCu) {
            if (apcu_exists($key)) {
                return apcu_fetch($key);
            }
        }
        else {
            if (apc_exists($key)) {
                return apc_fetch($key);
            }
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
        if ($this->isAPCu) {
            if (apcu_exists($key)) {
                return apcu_delete($key);
            }
        }
        else {
            if (apc_exists($key)) {
                return apc_delete($key);
            }
        }
        return false;
    }

}
