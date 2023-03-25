<?php
namespace App\Controlers;

use App\App;

class HomeControler {


    public function home()
    {
        
        return App::view('home/index', [
            'title' => 'Home'
        ]);
    }
}