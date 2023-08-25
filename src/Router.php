<?php

namespace M2\WebRouter;

use M2\WebRouter\Exception\RouteNotFoundException;

class Router 
{
    
    public array $RouteCollection;

    public function registerRoute(string $route, callable $callback): void
    {   
        $parsedRoute = $this->parseRoute($route);
        $this->RouteCollection[] = [
            ...$parsedRoute,  
            "callback" => $callback
        ];
    }

    public function executeRoute(string $route)
    {
        //find a matching route
        $foundRoute = $this->findMatchingRoute($route);

        //get argument part of route string
        $argumentString = str_replace($foundRoute["route"], "", $route);

        $arguments = $this->parseArguments($argumentString);

        if($foundRoute != null)
        {
            $foundRoute["callback"](...$arguments);
        }
        else
        {
            throw new RouteNotFoundException();
        }
    }

    public function findMatchingRoute(string $route)
    {
        //find matching route from the route collection array
        $foundRoute = null;
        $run = true;

        while($run)
        {
            $foundRoute = $this->findRouteInCollection($route);

            if(($foundRoute == null && $route == "/") || $foundRoute != null)
            {
                $run = false;
            }
            else 
            {
                $this->deconstructRoute($route);
            }
        }

        return $foundRoute;
    }

    public function deconstructRoute(string &$route)
    {
        //remove last basename from route
        $routeParts = explode("/", $route);
        array_pop($routeParts);
        $route = implode("/", $routeParts);
    }

    public function findRouteInCollection(string $searchString)
    {
        foreach($this->RouteCollection as $route)
        {
            if($route["route"] == $searchString)
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
            "arguments" => []
        ];

        $routeParts = explode("/", $route);
        $actualRouteParts = [];
        foreach($routeParts as $routePart)
        {
            if(str_contains($routePart, "{") && str_contains($routePart, "}"))
            {
                array_push($parsedRoute["arguments"], $routePart);
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

    public function parseArguments(string $argumentString)
    {
        $argumentParts = explode("/", $argumentString);

        $arguments = [];
        foreach($argumentParts as $argument)
        {
            if(trim($argument) != "")
            {
                array_push($arguments, $argument);
            }
        }

        return $arguments;
    }
}