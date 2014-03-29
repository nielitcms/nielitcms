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

Route::get('/user/create', array('uses'=>'UserController@create', 'before'=>'auth'));
Route::post('/user/create', array('uses'=>'UserController@createUser', 'before'=>'auth'));
Route::get('/user', array('uses'=>'UserController@index', 'before'=>'auth'));
Route::get('/user/delete/{id}', 'UserController@remove');
Route::get('/user/edit/{id}', array('uses'=>'UserController@edit', 'before'=>'auth'));
Route::post('/user/edit/{id}', array('uses'=>'UserController@postEdit', 'before'=>'auth'));
Route::get('/user/changepassword/{id}', array('uses'=>'UserController@ChangePassword', 'before'=>'auth'));
Route::post('/user/changepassword/{id}', array('uses'=>'UserController@PostChangePassword', 'before'=>'auth'));

Route::get('/category/create', array('uses'=>'CategoryController@create', 'before'=>'auth'));
Route::post('/category/create', array('uses'=>'CategoryController@postCreate', 'before'=>'auth'));
Route::get('/category', 'CategoryController@index');
Route::get('/category/delete/{id}', array('uses'=>'CategoryController@remove', 'before'=>'auth'));
Route::get('/category/edit/{id}', array('uses'=>'CategoryController@edit', 'before'=>'auth'));
Route::post('/category/edit/{id}', array('uses'=>'CategoryController@postedit', 'before'=>'auth'));

Route::get('/post/create', 'PostController@create');
Route::post('/post/create', 'PostController@store');
Route::get('/post', 'PostController@index');
Route::get('/post/edit/{id}', array('uses'=>'PostController@edit', 'before'=>'auth'));
Route::post('/post/edit/{id}', array('uses'=>'PostController@update', 'before'=>'auth'));
Route::get('/post/delete/{id}', array('uses'=>'PostController@destroy', 'before'=>'auth'));

Route::get('/page/create', 'PageController@create');
Route::post('/page/create', 'PageController@store');
Route::get('/page', 'PageController@index');
Route::get('/page/delete/{id}', 'PageController@destroy');
Route::get('/page/edit/{id}', 'PageController@edit');
Route::post('/page/edit/{id}', 'PageController@update');

Route::get('/admin', array('uses'=>'AdminController@getIndex', 'before'=>'auth'));

Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@authenticate');
Route::get('/logout', 'AuthController@logout');

Route::get('/settings', array('uses'=>'SettingController@index', 'before'=>'auth'));
Route::post('/settings', array('uses'=>'SettingController@store', 'before'=>'auth'));

Route::get('/profile', array('uses'=>'ProfileController@index', 'before'=>'auth'));
Route::post('/profile', array('uses'=>'ProfileController@store', 'before'=>'auth'));
Route::get('/profile/change-password', array('uses'=>'ProfileController@changepassword', 'before'=>'auth'));
Route::post('/profile/change-password', array('uses'=>'ProfileController@storepassword', 'before'=>'auth'));

Route::get('/download/create', 'DownloadController@create');
Route::post('/download/create', 'DownloadController@store');
Route::get('/download', 'DownloadController@index');
Route::get('/download/delete/{id}', 'DownloadController@destroy');
Route::get('/download/edit/{id}', 'DownloadController@edit');
Route::post('/download/edit/{id}', 'DownloadController@update');
Route::get('/download/{id}', 'DownloadController@show');

