<?php
use App\Http\Request\Request;
use App\Http\Request\Router;

$router = new Router(new Request);

$router->get('/', 'HomeController@index');
$router->get('/about', 'AboutUsController@index');
$router->get('/greet', 'AboutUsController@greeting');