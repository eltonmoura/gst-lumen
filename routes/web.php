<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', 'HomeController@index');

// CRUDL User ------------------------------------------------------------
// Cria um novo User
$router->post('/user', 'UserController@create');
// Exibe um User identificado pelo Id
$router->get('/user/{id:[0-9]+}', 'UserController@read');
// Edita um User identificado pelo Id
$router->patch('/user/{id:[0-9]+}', 'UserController@update');
// Apaga um User identificado pelo Id
$router->delete('/user/{id:[0-9]+}', 'UserController@delete');
// Lista os Users criados
$router->get('/user', 'UserController@list');
// -----------------------------------------------------------------------

$router->get('/admin', 'AdminController@index');
