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

use App\Services\RabbitMQService;

$router->get('/', function () use ($router) {
 /*   app('amqp')->publish(json_encode(['message' => 'Hello']), 'user.cmd.getOneNotification', [
        'exchange' => [
            'type'    => 'direct',
            'name'    => 'orka.requestreply',
        ],
    ]);*/

    (new RabbitMQService())->send(json_encode(['message' => 'Hello']), 'user.cmd.getOneNotification', ['message' => 'a class of data lol']);

    return $router->app->version();
});
