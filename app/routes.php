<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@welcome');
Route::get('/test1', 'HomeController@test1');

Route::get('/user', 'UserController@index');
Route::get('/page', 'PageController@index');
Route::get('/pageshow', 'PageController@show');

Route::post('/postuser', 'UserController@receiveUser');


// Route::get('/', function()
// {
// 	return View::make('hello');
// });

// Route::get('/wishme', function()
// {
// 	return View::make('hi');
// });

// Route::get('/wishmeagain', function()
// {
// 	return View::make('hi');
// });

// Route::get('/wishme/123.html', function()
// {
// 	return View::make('hi');
// });

// Route::get('/testme', function()
// {
// 	return "<h5>Hello There</h5>";
// });

// Route::get('/hello', function(){
// 	return "Hello";
// });

// Route::get('/testme/testme', function()
// {
// 	$a = 1;
// 	$b = 2;
// 	return $a+$b;
// });
