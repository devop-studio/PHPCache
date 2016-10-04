<?php

namespace Millennium\Cache\Cache\Exceptions;

class DriverNotSupported extends \Exception
{
    public function __construct($message = 'Driver not supported', $code = 500, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
