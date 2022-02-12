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


// $router->get('/test', 'RestController@test');


$router->group(['middleware' => 'Token','prefix' => '/api'], function () use ($router) {
    $router->group(['prefix' => '/v1'], function () use ($router) {
        $router->get('/players', 'V1\PlayersController@Players');
        $router->get('/allplayers', 'V1\PlayersController@AllPlayers');
        $router->post('/team', 'V1\PlayersController@Team');
    });
});