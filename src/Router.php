<?php

namespace UrlParser;

class Router 
{
    
    public array $RouteCollection;

    public function registerRoute(string $path, callable $callback)
    {   
        $this->RouteCollection[$path] = $callback;
    }

    public function parseRoute(string $route)
    {
        //parse route and return an array containing the main route + variables
        $parsedRoute = [
            "route" => "",
            "variables" => []
        ];

        $routeParts = explode("/", $route);
        $actualRouteParts = [];
        foreach($routeParts as $routePart)
        {
            if(str_contains($routePart, "{") && str_contains($routePart, "}"))
            {
                array_push($parsedRoute["variables"], $routePart);
            }
            else 
            {
                array_push($actualRouteParts, $routePart);
            }
        }

        //join the actualRoute
        $actualRoute = implode("/", $actualRouteParts);
        $parsedRoute["route"] = $actualRoute;
        
        return $parsedRoute;
    }
}