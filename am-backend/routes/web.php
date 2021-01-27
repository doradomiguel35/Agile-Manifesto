<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/login', 'AuthController@login');

$router->group(['prefix' => 'values'], function () use ($router){
    $router->get('', 'AMValuesController@all');

    $router->group(['middleware' => 'auth:api'], function () use ($router){
        $router->post('/create', 'AMValuesController@add');
        $router->post('{id}/update', 'AMValuesController@update');
        $router->delete('{id}/delete', 'AMValuesController@delete');
    });
});

$router->group(['prefix' => 'principles'], function () use ($router){
    $router->get('', 'AMPrinciplesController@all');
    
    $router->group(['middleware' => 'auth:api'], function () use ($router){
        $router->post('/create', 'AMPrinciplesController@add');
        $router->post('{id}/update', 'AMPrinciplesController@update');
        $router->delete('{id}/delete', 'AMPrinciplesController@delete');
    });
});

$router->group(['middleware' => 'auth:api'], function() use ($router){
    $router->post('/logout', 'AuthController@logout');
});