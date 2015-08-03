<?php

namespace Millennium\Exceptions;

class DriverNotFoundException extends \Exception
{

    public function __construct($message = 'Cache Driver not found', $code = 500, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
