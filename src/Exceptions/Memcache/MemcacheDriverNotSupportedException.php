<?php

namespace Millennium\Exceptions\Memcache;

class MemcacheDriverNotSupportedException extends \Exception
{
    
    public function __construct($message = "Memcache driver not supported on your system", $code = 500, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
    
}