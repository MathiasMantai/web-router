<?php

namespace UrlParser;

class ArrayDumper 
{
    public static function dumpArray(array $array)
    {
        print '<pre style="font-size: 15px;">';
        var_dump($array); 
        print '</pre>';
    }

    
}