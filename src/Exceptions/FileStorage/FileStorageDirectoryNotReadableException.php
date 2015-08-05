<?php

namespace Millennium\Cache\Exceptions\FileStorage;

class FileStorageDirectoryNotReadableException extends \Exception
{

    public function __construct($message = "Directory not readable", $code = 500, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
