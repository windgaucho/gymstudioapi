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

$router->get('/rubros', 'RubrosController@index');
$router->post('/rubros', 'RubrosController@store');
$router->get('/rubros/{rubros}', 'RubrosController@show');
$router->put('/rubros/{rubros}', 'RubrosController@update');
$router->get('/rubros/{rubros}', 'RubrosController@show');
$router->delete('/rubros/{rubros}', 'RubrosController@destroy');

$router->get('/articulos', 'ArticulosController@index');
$router->post('/articulos', 'ArticulosController@store');
$router->get('/articulos/{articulos}', 'ArticulosController@show');
$router->put('/articulos/{articulos}', 'ArticulosController@update');
$router->get('/articulos/{articulos}', 'ArticulosController@show');
$router->delete('/articulos/{teachers}', 'ArticulosController@destroy');

$router->get('/clientes', 'ClientesController@index');
$router->post('/clientes', 'ClientesController@store');
$router->get('/clientes/{clientes}', 'ClientesController@show');
$router->put('/clientes/{clientes}', 'ClientesController@update');
$router->get('/clientes/{clientes}', 'ClientesController@show');
$router->delete('/clientes/{clientes}', 'ClientesController@destroy');