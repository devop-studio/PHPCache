<?php

namespace Millennium\Exceptions;

class DriverMisconfiguredException extends \Exception
{

    public function __construct($message = "Please configurate driver cache", $code = 500, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
