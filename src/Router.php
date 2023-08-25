<?php

namespace UrlParser;

class Router 
{
    
    public array $RouteCollection;

    public function registerRoute(string $path, callable $callback)
    {   
        $this->RouteCollection[$path] = $callback;
    }
}