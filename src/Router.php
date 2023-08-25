<?php

namespace UrlParser;

use UrlParser\RouteNotFoundException;

class Router 
{
    
    public array $RouteCollection;

    public function registerRoute(string $route, callable $callback)
    {   
        $this->RouteCollection[] = [
            "route" => $route,  
            "callback" => $callback
        ];
    }

    public function executeRoute(string $route, array $arguments)
    {
        $foundRoute = $this->findRouteInCollection($route);

        if($foundRoute != null)
        {
            $foundRoute["callback"](...$arguments);
        }
        else
        {
            throw new RouteNotFoundException();
        }
    }

    public function findRouteInCollection(string $searchString)
    {
        foreach($this->RouteCollection as $route)
        {
            if(str_contains($route["route"], $searchString))
            {
                return $route;
            }
        }

        return null;
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