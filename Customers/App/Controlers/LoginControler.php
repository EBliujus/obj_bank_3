<?php
namespace App\Controlers;
use App\App;
use App\Services\Auth;

class LoginControler {


    public function show()
    {
        
        return App::view('login/index', [
            'title' => 'Login',
            'hideHeader' => true
        ]);
    }

    public function login()
    {
        if (Auth::get()->login($_POST['name'], $_POST['psw'])) {
            return App::redirect('clients');
        }
        return App::redirect('login');
    }

    public function logout()
    {
        Auth::get()->logout();
        return App::redirect('login');
    }

}
