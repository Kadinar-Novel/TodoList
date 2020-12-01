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

$router->post('/create_todo_list', 'TodoListController@createTodo');
$router->get('/show_all_todo_list', 'TodoListController@showAllData');
$router->get('/show_all_todo_list/{id}', 'TodoListController@showDetailData');
$router->put('/update_todo_list/{id}', 'TodoListController@updateTodo');
$router->delete('/delete_todo_list/{id}', 'TodoListController@deleteTodo');
