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

$router->get('/', 'LoginController@index');

$router->post('/login', 'LoginController@login');

$router->post('/validate', 'LoginController@validateLogin');

$router->get('/admin/dashboard', 'SuperAdminController@dashboard');

$router->get('/admin/getall/{client}', 'SuperAdminController@getAll');