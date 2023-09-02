<?php

namespace MMantai\WebRouter\Exception;
use Exception;
use Throwable;

class InvalidUrlException extends Exception
{
    public function __construct($message = "Invalid Url", $code = 0, Throwable $previous = null) 
    {
        parent::__construct($message, $code, $previous);
    }
}