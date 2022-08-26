<?php

/** @var \Laravel\Lumen\Routing\Router $router */
// use \Laravel\Lumen\Routing\Router;

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

$router->group(['prefix' => 'api'], function () use ($router){
    $router->post('/login', 'AuthController@login');
});
// $router->group(['middleware' => 'auth','prefix' => 'api2'], function() use ($router){
//     
// });

$router->group(['prefix' => 'posts', 'middleware' => 'auth'], function() use ($router){
    $router->post('/create', function() {
        return response()->json("jadgjjakd", 200);
    });
});


$router->group(['prefix' => 'v1', 'middleware' => 'auth'], function() use ($router){
    // $arr = "['admin', 'editer']";
    
    $router->get('/post',[
        'middleware' => ["roles:admin,editer"],
        'uses' => 'ExampleController@index'
    ]);

    // posts: crud
    // +admin, user, admin

    // admin
});