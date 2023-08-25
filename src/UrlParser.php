<?php
namespace M2\WebRouter;

use M2\WebRouter\Exception\InvalidCrudOperationException;
use M2\WebRouter\Exception\InvalidUrlException;
use M2\WebRouter\Router;

class UrlParser 
{
    public function parseUrl(string $url, Router $router) 
    {
        $parsedUrl = parse_url($url);

        if(!$parsedUrl) 
        {
            return false;
        }

        $path = $parsedUrl["path"];
        return $path;
    }

    


    // public function tryParseUrl(string $url)
    // {
    //     $parsedUrl = parse_url($url);

    //     if(!$parsedUrl) 
    //     {
    //         return false;
    //     }

    //     return true;
    // }

    // private function parseUrlPath(array $parsedUrl): array|string
    // {
    //     $path = $parsedUrl["path"];

    //     $pathComponents = explode("/", $path);

    //     if(gettype($pathComponents) != "array")
    //     {
    //         throw new InvalidUrlException();
    //     }

    //     array_shift($pathComponents);

    //     return $pathComponents;
    // }

    // private function validateUrlPath(array $pathComponents)
    // {
    //     //check if the operation is valid
    //     $operation = $pathComponents[0];
    //     if(!in_array(strtoupper($operation), ["CREATE", "READ", "UPDATE", "DELETE"]))
    //     {
    //         throw new InvalidCrudOperationException();
    //     }
    // }

    // private function validateRoute()
    // {

    // }
}