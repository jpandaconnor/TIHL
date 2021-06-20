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

use App\Services\MQMessage;
use App\Services\RabbitMQService;

$router->get('/', function () use ($router) {
  // $t = (new MQMessage())->send('user', 'getOneNotification', ['message' => 'Hello']);

    $e = (new \App\Services\MQEvent())->publish('user', 'deleted', ['message' => 'Hello']);


//    dump($t);
    return $router->app->version();
});
