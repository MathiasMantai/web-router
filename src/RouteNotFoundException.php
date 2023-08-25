<?php

namespace M2\WebRouter;
use Exception;
use Throwable;

class RouteNotFoundException extends Exception
{
    public function __construct($message = "No matching Route Found", $code = 0, Throwable $previous = null) 
    {
        parent::__construct($message, $code, $previous);
    }
}