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
Route::get('/user/delete/{id}', array('uses'=>'UserController@remove','before'=>'auth'));
Route::get('/user/edit/{id}', array('uses'=>'UserController@edit', 'before'=>'auth'));
Route::post('/user/edit/{id}', array('uses'=>'UserController@postEdit', 'before'=>'auth'));
Route::get('/user/changepassword/{id}', array('uses'=>'UserController@ChangePassword', 'before'=>'auth'));
Route::post('/user/changepassword/{id}', array('uses'=>'UserController@PostChangePassword', 'before'=>'auth'));

Route::get('/category/create', array('uses'=>'CategoryController@create', 'before'=>'auth'));
Route::post('/category/create', array('uses'=>'CategoryController@postCreate', 'before'=>'auth'));
Route::get('/category', array('uses'=>'CategoryController@index','before'=>'auth'));
Route::get('/category/delete/{id}', array('uses'=>'CategoryController@remove', 'before'=>'auth'));
Route::get('/category/edit/{id}', array('uses'=>'CategoryController@edit', 'before'=>'auth'));
Route::post('/category/edit/{id}', array('uses'=>'CategoryController@postedit', 'before'=>'auth'));


Route::get('/post/create', array('uses'=>'PostController@create','before'=>'auth'));
Route::post('/post/create', array('uses'=>'PostController@store','before'=>'auth'));
Route::get('/post', array('uses'=>'PostController@index','before'=>'auth'));
Route::get('/post/edit/{id}', array('uses'=>'PostController@edit', 'before'=>'auth'));
Route::post('/post/edit/{id}', array('uses'=>'PostController@update', 'before'=>'auth'));
Route::get('/post/delete/{id}', array('uses'=>'PostController@destroy', 'before'=>'auth'));

Route::get('/page/create', array('uses'=>'PageController@create','before'=>'auth'));
Route::post('/page/create', array('uses'=>'PageController@store','before'=>'auth'));
Route::get('/page', array('uses'=>'PageController@index','before'=>'auth'));
Route::get('/page/delete/{id}', array('uses'=>'PageController@destroy','before'=>'auth'));
Route::get('/page/edit/{id}', array('uses'=>'PageController@edit','before'=>'auth'));
Route::post('/page/edit/{id}', array('uses'=>'PageController@update','before'=>'auth'));

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

Route::get('/download/create', array('uses'=>'DownloadController@create','before'=>'auth'));
Route::post('/download/create', array('uses'=>'DownloadController@store','before'=>'auth'));
Route::get('/download', array('uses'=>'DownloadController@index','before'=>'auth'));
Route::get('/download/delete/{id}', array('uses'=>'DownloadController@destroy','before'=>'auth'));
Route::get('/download/edit/{id}', array('uses'=>'DownloadController@edit','before'=>'auth'));
Route::post('/download/edit/{id}', array('uses'=>'DownloadController@update','before'=>'auth'));
Route::get('/download/{id}', array('uses'=>'DownloadController@show','before'=>'auth'));

Route::get('/album/create', array('uses'=>'AlbumController@create','before'=>'auth'));	
Route::post('/album/create', array('uses'=>'AlbumController@store','before'=>'auth'));
Route::get('/album', array('uses'=>'AlbumController@index','before'=>'auth'));
Route::get('/album/edit/{id}', array('uses'=>'AlbumController@edit','before'=>'auth'));
Route::post('/album/edit/{id}', array('uses'=>'AlbumController@update','before'=>'auth'));
Route::get('/album/delete/{id}', array('uses'=>'AlbumController@destroy','before'=>'auth'));

Route::get('/photo/add/{id}', array('uses'=>'PhotoController@create','before'=>'auth'));
Route::post('/photo/add/{id}', array('uses'=>'PhotoController@store','before'=>'auth'));
Route::get('/album/photo/{id}', array('uses'=>'PhotoController@index','before'=>'auth'));
Route::get('/photo/{id}', array('uses'=>'PhotoController@show','before'=>'auth'));
Route::get('/photo/delete/{id}', array('uses'=>'PhotoController@destroy','before'=>'auth'));
Route::get('/photo/edit/{id}', array('uses'=>'PhotoController@edit','before'=>'auth'));
Route::post('/photo/edit/{id}', array('uses'=>'PhotoController@update','before'=>'auth')); 

Route::get('/menu/list/{menulocation}', array('uses'=>'MenuController@index','before'=>'auth'));
Route::get('/menu/create/{menulocation}', array('uses'=>'MenuController@create','before'=>'auth'));
Route::post('/menu/create/{menulocation}', array('uses'=>'MenuController@store','before'=>'auth'));
Route::get('/menu/edit/{id}', array('uses'=>'MenuController@edit','before'=>'auth'));
Route::post('/menu/edit/{id}', array('uses'=>'MenuController@update','before'=>'auth'));
Route::get('/menu/delete/{id}', array('uses'=>'MenuController@destroy','before'=>'auth'));

Route::get('denied', array('uses'=>'AuthController@denied'));

