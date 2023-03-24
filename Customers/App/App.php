<?php
namespace App;

use App\Controlers\HomeControler;

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
            return (new HomeControler)->home();
        } 
        
        else {
            return '<h1>404 Page Not Found</h1>';
        }
    }


        public static function view($tmp) 
        {
            $path = __DIR__ . '/../views/';

            require $path . 'top.php';

            require $path . $tmp . '.php';

            require $path . 'bottom.php';
        }
}