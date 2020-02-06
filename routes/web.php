<?php

$router->get('', function()
{
    return json_encode(["message" => "Bem vindo a api do salao!"]);
});

$router->post('/login', "FuncionarioController@authenticate");

$router->get('/pessoas', "PessoaController@getAll");

$router->group(["prefix" => "/pessoa", 'middleware' => 'auth'], function() use ($router){
    $router->get('/{id}', "PessoaController@getById");
    $router->post('/', "PessoaController@insert");
    $router->put('/{id}', "PessoaController@update");
    $router->delete('/{id}', "PessoaController@delete");
});

$router->get('/servicos', "ServicoController@getAll");

$router->group(["prefix" => "/servico", 'middleware' => 'auth'], function() use($router){
    $router->get('/{id}', "ServicoController@getById");
    $router->post('/', "ServicoController@insert");
    $router->put('/{id}', "ServicoController@update");
    $router->delete('/{id}', "ServicoController@delete");
});

$router->get('/vendas', "VendaController@getAll");

$router->group(["prefix" => "/venda", 'middleware' => 'auth'], function() use($router){
    $router->get('/{id}', "VendaController@getById");
    $router->post('/', "VendaController@insert");
    $router->put('/{id}', "VendaController@update");
    $router->delete('/{id}', "VendaController@delete");
});
