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
    return $router->app->version();
});

$router->group(["prefix" => "employees"], function() use ($router) {

	$router->post("add", ["as" => "employees.add", "uses" => "EmployeesController@addEmployee"]);

	$router->post("update/{uuid}", ["as" => "employees.update", "uses" => "EmployeesController@updateEmployee"]);

	$router->get("view/{uuid}", ["as" => "employees.view", "uses" => "EmployeesController@viewEmployee"]);

	$router->post("list[/{page:\d+}]", ["as" => "employees.list", "uses" => "EmployeesController@getEmployeeList"]);


});
