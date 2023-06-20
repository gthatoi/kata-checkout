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
$router->post('/checkout', [
    'uses' => 'CheckoutController@post'
]);

$router->get('/', function () use ($router) {
    return '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Kata Checkout</title>
        </head>
        <body>
            <img src="/images/cat.jpg" alt="Catieee">
        </body>
        </html>
    ';
});
