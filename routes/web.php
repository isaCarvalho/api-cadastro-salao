<?php

$router->get('/api/pessoas', "PessoaController@getAll");

$router->group(["prefix" => "/api/pessoa"], function() use ($router){
    $router->get('/{id}', "PessoaController@getById");
    $router->post('/', "PessoaController@insert");
    $router->put('/{id}', "PessoaController@update");
    $router->delete('/{id}', "PessoaController@delete");
});

$router->get('/api/servicos', "ServicoController@getAll");

$router->group(["prefix" => "/api/servico"], function() use($router){
    $router->get('/{id}', "ServicoController@getById");
    $router->post('/', "ServicoController@insert");
    $router->put('/{id}', "ServicoController@update");
    $router->delete('/{id}', "ServicoController@delete");
});

$router->get('/api/vendas', "VendaController@getAll");

$router->group(["prefix" => "/api/venda"], function() use($router){
    $router->get('/{id}', "VendaController@getById");
    $router->post('/', "VendaController@insert");
    $router->put('/{id}', "VendaController@update");
    $router->delete('/{id}', "VendaController@delete");
});