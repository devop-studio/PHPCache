<?php

namespace Millennium\Cache\Drivers;

use Millennium\Cache\Interfaces\CacheDriver;
use Millennium\Cache\Exceptions\FileStorage\FileStorageMisconfiguration;

class FileStorageDriver implements CacheDriver
{

    /**
     *
     * @var string
     */
    private $cachePath = './cache';

    /**
     *
     * @var integer
     */
    private $expire = 3600;

    /**
     * 
     * @param array $options
     * 
     * @throws FileStorageMisconfiguration
     */
    public function __construct(array $options = null)
    {
        if (null === $options) {
            throw new FileStorageMisconfiguration;
        }
        if (!isset($options['path'])) {
            throw new FileStorageMisconfiguration("Please set path for file storage driver.");
        }
        if (!is_dir($options['path']) || !is_readable($options['path'])) {
            throw new \Millennium\Cache\Exceptions\FileStorage\FileStorageDirectoryNotReadableException($options['path']);
        }
        $this->expire = isset($options['expire']) && ctype_digit($options['expire']) ? $options['expire'] : 3600;
        $this->cachePath = rtrim($options['path'], DIRECTORY_SEPARATOR);
    }

    /**
     * 
     * @param string $key
     * 
     * @return boolean
     */
    public function fetch($key)
    {
        if (file_exists($this->cachePath . DIRECTORY_SEPARATOR . $key . ".cache")) {
            if (filemtime($this->cachePath . DIRECTORY_SEPARATOR . $key . ".cache") >= time() - $this->expire) {
                return unserialize(file_get_contents($this->cachePath . DIRECTORY_SEPARATOR . $key . ".cache"));
            }
            else {
                unlink($this->cachePath . DIRECTORY_SEPARATOR . $key . ".cache");
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
        if (file_exists($this->cachePath . DIRECTORY_SEPARATOR . $key . ".cache")) {
            unlink($this->cachePath . DIRECTORY_SEPARATOR . $key . ".cache");
        }
        return true;
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
        if (file_exists($this->cachePath . DIRECTORY_SEPARATOR . $key . ".cache")) {
            unlink($this->cachePath . DIRECTORY_SEPARATOR . $key . ".cache");
        }
        return file_put_contents($this->cachePath . DIRECTORY_SEPARATOR . $key . ".cache", serialize($data));
    }

}
