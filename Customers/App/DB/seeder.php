<?php 

$users = [
    ['name' => 'one@one.lt', 'psw' => md5('1234')],
    ['name' => 'two@one.lt', 'psw' => md5('1234')],
    ['name' => 'three@one.lt', 'psw' => md5('1234')]
];

file_put_contents (__DIR__ .'/users.json', json_encode($users));

echo 'All is GOOD';
