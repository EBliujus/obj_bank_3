<?php
namespace App;

class App {

    public static function process() 
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($url); 

        return self::router($url);

    }

    private static function router(array $url) 
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'GET' && count($url) == 1 && $url[0] === '') 
        {
            return 'JOOO';
        } 
        
        else {
            return ' noooo JOOOOO';
        }
    }

}