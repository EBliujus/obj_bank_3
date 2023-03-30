<?php
namespace App\Controlers;
use App\App;
use App\DB\Json;
use App\Services\Auth;
use App\Services\Messages;

class ClientControler {

    public function __construct()
    {
        if (!Auth::get()->isAuth()) {
            App::redirect('login');
            die;
        }
    }


    public function index()
    {
        $clients = (new Json)-> showAll();
        return App::view('clients/index', [
            'title' => 'Clients List',
            'clients' => $clients
        ]);
    }

    public function create()
    {
        
        return App::view('clients/create', [
            'title' => 'New Client'
        ]);
    }

    public function store()
    {
        // ka gauna naujas client'as reiks prirasyti ak sasNR. balance0!!!!!
        $data = [];
        $data['name'] = $_POST['name'];
        $data['surname'] = $_POST['surname'];
        // $data['tt'] = isset($_POST['tt']) ? 1 : 0; checkBox jei butu pasetintas ar nepasetintas
        Messages::msg()->addMessage('New client was created', 'success');
        (new Json)-> create($data);
        return App::redirect('clients');
    }
    public function show($id) 
    {
        $client = (new Json)-> show($id);

        return App::view('clients/show', [
            'title' => 'Clients Page',
            'client' => $client
        ]);
    }
    public function edit($id) 
    {
        $client = (new Json)-> show($id);

        return App::view('clients/edit', [
            'title' => 'Edit Clients',
            'client' => $client
        ]);
    }
    public function update($id)
    {
        $data = [];
        $data['name'] = $_POST['name'];
        $data['surname'] = $_POST['surname'];
        // istryniau $id is update salia data
        (new Json)-> update($data); 
        Messages::msg()->addMessage('New client was edited', 'warning');
        return App::redirect('clients');
    }
    public function delete($id)
    {
        (new Json)-> delete($id);
        Messages::msg()->addMessage('The client gone', 'warning');
        return App::redirect('clients');
    }
}