<?php

namespace Millennium\Cache\Exceptions\FileStorage;

class FileStorageMisconfiguration extends \Exception
{
    public function __construct($message = 'File storage driver missing configuration', $code = 500, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
