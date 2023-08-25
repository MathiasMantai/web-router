<?php

namespace M2\WebRouter;

class VarDumper 
{
    public static function dumpVar(string|float|array|bool|null $var)
    {
        print '<pre style="font-size: 15px;">';
        var_dump($var); 
        print '</pre>';
    }
}