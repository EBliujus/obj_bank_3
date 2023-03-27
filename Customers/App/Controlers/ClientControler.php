<?php
namespace App\Controlers;
use App\App;
use App\DB\Json;

class ClientControler {

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
        (new Json)-> update($id, $data);
        return App::redirect('clients');
    }
}