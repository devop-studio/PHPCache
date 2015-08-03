<?php

namespace Millennium\Exceptions\APC;

class APCDriverNotSupportedException extends \Exception
{

    public function __construct($message = "APC Cache Driver not supported on your system", $code = 500, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
