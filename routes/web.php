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

/** @var \Laravel\Lumen\Routing\Router $router */
$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->group(['prefix' => 'produtos'], function () use ($router) {
        $router->get('', 'ProdutoController@index');
        $router->post('', 'ProdutoController@store');
        $router->get('{id}', 'ProdutoController@show');
        $router->put('{id}', 'ProdutoController@update');
        $router->delete('{id}', 'ProdutoController@destroy');
    });

    $router->group(['prefix' => 'qrcodes'], function () use ($router) {
        $router->get('', 'QRCodeController@index');
        $router->post('', 'QRCodeController@store');
        $router->get('{id}', 'QRCodeController@show');
        $router->put('{id}', 'QRCodeController@update');
        $router->delete('{id}', 'QRCodeController@destroy');
    });
});

$router->post('/auth', 'AuthController@buildToken'); // なに!?
