<?php
namespace App\Controlers;

use App\App;

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
        $users = json_decode(file_get_contents(__DIR__ .'/../../DB/users.json'), 1);
        foreach($users as $user) {
            if ($user['name'] == $_POST['name'] && $user['password'] == md5($_POST['password'])) {
                $_SESSION['logged'] = 1;
                $_SESSION['name'] = $user['name'];
                return App::redirect('clients');
            }
        }
    }
}