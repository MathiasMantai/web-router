<?php

namespace MMantai\WebRouter\Exception;
use Exception;
use Throwable;

class InvalidCrudOperationException extends Exception 
{
    public function __construct($message = "Invalid Crud Operation", $code = 0, Throwable $previous = null) 
    {
        parent::__construct($message, $code, $previous);
    }
}