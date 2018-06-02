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

// CRUDL User
$router->group(['prefix' => 'user'], function () use ($router) {
    $router->post('/', 'UserController@create');
    $router->get('/{id:[0-9]+}', 'UserController@read');
    $router->patch('/{id:[0-9]+}', 'UserController@update');
    $router->delete('/{id:[0-9]+}', 'UserController@delete');
    $router->get('/', 'UserController@list');
});

$router->get('/admin', 'AdminController@index');
