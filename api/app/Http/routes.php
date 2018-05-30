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

$router->get('/', function () use ($router) {
    return 'Welcome to the User management v1.0';
});

$router->group(array('middleware' => array('cors')), function () use ($router){

  $router->post('/login', 'UserController@login');

  $router->get('/user', 'UserController@getUsers');
});

$router->group(array('middleware' => array('auth', 'cors'), 'prefix' => 'api'), function () use ($router){

  //Se que no es correcto todo eso con post, pero no se por que no me funcionó bien aca el PUT y el delete
  //Y no entendi por que si en laravel me funciona bien

  $router->post('/user', 'UserController@create');

  $router->post('/user-update', 'UserController@update');

  $router->post('/user-config', 'UserController@updateByToken');

  $router->post('/user-delete', 'UserController@delete');
});
