<?php
namespace App\DB;

class Json implements DataBase {

    private $data;

    public function __construct()
    {
        if(!file_exists(__DIR__ . '/data.json')) {
            file_put_contents(__DIR__ . '/data.json', json_encode([]));
        }

        $this->data = json_decode(file_get_contents(__DIR__ . '/data.json'), 1);
    }

    public function __destruct()
    {
        file_put_contents(__DIR__ . '/data.json', json_encode($this->data));
    }



    function create(array $clientData) : void
    {
        $id = rand(1000000, 99999999);
        $clientData['id'] = $id;
        $iban = 'LT' . rand(10, 99) . 10100 . rand(10000000000, 99999999999);
        $clientData['iban'] = $iban;
        $personalId = rand(3,6) . substr(rand(1923, 2023), -2) . str_pad(rand(1, 12), 2, 0, STR_PAD_LEFT) . str_pad(rand(1, 31), 2, 0, STR_PAD_LEFT) . str_pad(rand(1, 999), 3, 0, STR_PAD_LEFT) . rand(1, 9);
        $clientData['personalId'] = $personalId;
        $balance = 0;
        $clientData['balance'] = $balance;
        $this->data[] = $clientData;
    }

    function update(int $clientId, array $clientData) : void
    {
        $clientData['id'] = $clientId;
        $this->data = array_map(fn($d) => $d['id'] == $clientId ? $clientData : $d, $this->data);
    }

    function delete(int $clientId) : void
    {
        $this->data = array_filter($this->data, fn($d) => $d['id'] != $clientId);
        $this->data = array_values($this->data);
    }

    function show(int $clientId) : array
    {
        $c = array_filter($this->data, fn($d) => $d['id'] == $clientId);
        return array_shift($c);
    }

    function showAll() : array
    {
        return $this->data;
    }

    

}