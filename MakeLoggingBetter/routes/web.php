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
    try {
        \Illuminate\Support\Facades\Log::info('test123', [
            'id' => md5('This is a string'),
            'nick' => md5('This is a string'),
        ]);

        \Illuminate\Support\Facades\Log::error('test123', [
            'id' => md5('This is a string'),
        ]);
    } catch (Exception $e) {
        dump($e);
    }

    return $router->app->version();
});
