<?php

namespace M2\WebRouter;
use Exception;
use Throwable;

class InvalidUrlException extends Exception
{
    public function __construct($message = "Invalid Url", $code = 0, Throwable $previous = null) 
    {
        parent::__construct($message, $code, $previous);
    }
}