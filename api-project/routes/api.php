<?php
$router->get('/users', 'UsuarioController@index');
$router->post('/users', 'UsuarioController@store');
$router->get('/users/{id}', 'UsuarioController@show');
$router->put('/users/{id}', 'UsuarioController@update');
$router->delete('/users/{id}', 'UsuarioController@destroy');
?>