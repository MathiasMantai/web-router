<?php

namespace UrlParser;

class UrlParser 
{

    public function parseUrl(string $url) 
    {
        $parsedUrl = parse_url($url);

        if(!$parsedUrl) 
        {
            return false;
        }

        return $parsedUrl;
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
}

https://github.com/MathiasMantai/url-parser.git