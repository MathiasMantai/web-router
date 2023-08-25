<?php
namespace UrlParser;

use UrlParser\InvalidCrudOperationException;
use UrlParser\InvalidUrlException;
use UrlParser\Router;

class UrlParser 
{
    public function parseUrl(string $url, Router $router) 
    {
        $parsedUrl = parse_url($url);

        if(!$parsedUrl) 
        {
            return false;
        }

        $res = $this->parseUrlPath($parsedUrl);
        $res2 = $this->validateUrlPath($res);
        return $res2;
    }

    public function tryParseUrl(string $url)
    {
        $parsedUrl = parse_url($url);

        if(!$parsedUrl) 
        {
            return false;
        }

        return true;
    }

    private function parseUrlPath(array $parsedUrl): array|string
    {
        $path = $parsedUrl["path"];

        $pathComponents = explode("/", $path);

        if(gettype($pathComponents) != "array")
        {
            throw new InvalidUrlException();
        }

        array_shift($pathComponents);

        return $pathComponents;
    }

    private function validateUrlPath(array $pathComponents)
    {
        //check if the operation is valid
        $operation = $pathComponents[0];
        if(!in_array(strtoupper($operation), ["CREATE", "READ", "UPDATE", "DELETE"]))
        {
            throw new InvalidCrudOperationException();
        }
    }
}