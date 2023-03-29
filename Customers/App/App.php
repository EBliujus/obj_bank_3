<?php
namespace App;

use App\Controlers\HomeControler;
use App\Controlers\ClientControler;
use App\Controlers\LoginControler;

class App {

    public static function process() 
    {
        session_start();

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

        if ($method == 'GET' && count($url) == 2 && $url[0] === 'clients' && $url[1] === 'create') 
        {
            return (new ClientControler)->create();
        }

        if ($method == 'POST' && count($url) == 2 && $url[0] === 'clients' && $url[1] === 'create') 
        {
            return (new ClientControler)->store();
        }

        if ($method == 'GET' && count($url) == 1 && $url[0] === 'clients') 
        {
            return (new ClientControler)->index();
        }

        if ($method == 'GET' && count($url) == 3 && $url[0] === 'clients' && $url[1] === 'show') 
        {
            return (new ClientControler)->show($url[2]);
        }

        if ($method == 'GET' && count($url) == 3 && $url[0] === 'clients' && $url[1] === 'edit') 
        {
            return (new ClientControler)->edit($url[2]);
        }
        
        if ($method == 'POST' && count($url) == 3 && $url[0] === 'clients' && $url[1] === 'edit') 
        {
            return (new ClientControler)->update($url[2]);
        }

        if ($method == 'POST' && count($url) == 3 && $url[0] === 'clients' && $url[1] === 'delete') 
        {
            return (new ClientControler)->delete($url[2]);
        }

        if ($method == 'GET' && count($url) == 1 && $url[0] === 'login') 
        {
            return (new LoginControler)->show();
        }

        if ($method == 'POST' && count($url) == 1 && $url[0] === 'login') 
        {
            return (new LoginControler)->login();
        
        else {
            return '<h1>404 Page Not Found</h1>';
        }
    }


        public static function view($tmp, $data = []) 
        {
            $path = __DIR__ . '/../views/';
            // extract istraukia psl title, yrasome funkcijoj DATA ir HC prirasom funcijoj ['koreikia'=>'Koreikia']
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

        public static function redirect($url) 
        { 
            header('Location:' . URL . $url);
            return '';
            // die;
            // (return '' ;) taip pat galima ir return tuscia stinga rasyti vietoj DIE!
        }
}