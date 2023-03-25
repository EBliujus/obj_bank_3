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


        public static function view($tmp, $data = []) 
        {
            $path = __DIR__ . '/../views/';
            // extract istraukia psl title, yrasome funkcijoj DATA it HC prirasom funcijoj ['koreikia'=>'Koreikia']
            extract($data);
            // buferis su ob_start ir kitom funcijom ob_
            ob_start();
            require $path . 'top.php';
            require $path . $tmp . '.php';
            require $path . 'bottom.php';
            $html = ob_get_contents();
            ob_end_clean();
            return $html;
        }
}