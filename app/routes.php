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

Route::get('/', array('uses'=>'HomeController@index'));

Route::get('/admin/user/create', array('uses'=>'UserController@create', 'before'=>'auth'));
Route::post('/admin/user/create', array('uses'=>'UserController@createUser', 'before'=>'auth'));
Route::get('/admin/user', array('uses'=>'UserController@index', 'before'=>'auth'));
Route::get('/admin/user/delete/{id}', array('uses'=>'UserController@remove','before'=>'auth'));
Route::get('/admin/user/edit/{id}', array('uses'=>'UserController@edit', 'before'=>'auth'));
Route::post('/admin/user/edit/{id}', array('uses'=>'UserController@postEdit', 'before'=>'auth'));
Route::get('/admin/user/changepassword/{id}', array('uses'=>'UserController@ChangePassword', 'before'=>'auth'));
Route::post('/admin/user/changepassword/{id}', array('uses'=>'UserController@PostChangePassword', 'before'=>'auth'));

Route::get('/admin/category/create', array('uses'=>'CategoryController@create', 'before'=>'auth'));
Route::post('/admin/category/create', array('uses'=>'CategoryController@postCreate', 'before'=>'auth'));
Route::get('/admin/category', array('uses'=>'CategoryController@index','before'=>'auth'));
Route::get('/admin/category/delete/{id}', array('uses'=>'CategoryController@remove', 'before'=>'auth'));
Route::get('/admin/category/edit/{id}', array('uses'=>'CategoryController@edit', 'before'=>'auth'));
Route::post('/admin/category/edit/{id}', array('uses'=>'CategoryController@postedit', 'before'=>'auth'));


Route::get('/admin/post/create', array('uses'=>'PostController@create','before'=>'auth'));
Route::post('/admin/post/create', array('uses'=>'PostController@store','before'=>'auth'));
Route::get('/admin/post', array('uses'=>'PostController@index','before'=>'auth'));
Route::get('/admin/post/edit/{id}', array('uses'=>'PostController@edit', 'before'=>'auth'));
Route::post('/admin/post/edit/{id}', array('uses'=>'PostController@update', 'before'=>'auth'));
Route::get('/admin/post/delete/{id}', array('uses'=>'PostController@destroy', 'before'=>'auth'));

Route::get('/admin/page/create', array('uses'=>'PageController@create','before'=>'auth'));
Route::post('/admin/page/create', array('uses'=>'PageController@store','before'=>'auth'));
Route::get('/admin/page', array('uses'=>'PageController@index','before'=>'auth'));
Route::get('/admin/page/delete/{id}', array('uses'=>'PageController@destroy','before'=>'auth'));
Route::get('/admin/page/edit/{id}', array('uses'=>'PageController@edit','before'=>'auth'));
Route::post('/admin/page/edit/{id}', array('uses'=>'PageController@update','before'=>'auth'));

Route::get('/admin', array('uses'=>'AdminController@getIndex', 'before'=>'auth'));

Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@authenticate');
Route::get('/logout', 'AuthController@logout');
Route::get('/signout', 'AuthController@signout');

Route::get('/admin/settings', array('uses'=>'SettingController@index', 'before'=>'auth'));
Route::post('/admin/settings', array('uses'=>'SettingController@store', 'before'=>'auth'));

Route::get('/admin/profile', array('uses'=>'ProfileController@index', 'before'=>'auth'));
Route::post('/admin/profile', array('uses'=>'ProfileController@store', 'before'=>'auth'));
Route::get('/admin/profile/change-password', array('uses'=>'ProfileController@changepassword', 'before'=>'auth'));
Route::post('/admin/profile/change-password', array('uses'=>'ProfileController@storepassword', 'before'=>'auth'));

Route::get('/admin/download/create', array('uses'=>'DownloadController@create','before'=>'auth'));
Route::post('/admin/download/create', array('uses'=>'DownloadController@store','before'=>'auth'));
Route::get('/admin/download', array('uses'=>'DownloadController@index','before'=>'auth'));
Route::get('/admin/download/delete/{id}', array('uses'=>'DownloadController@destroy','before'=>'auth'));
Route::get('/admin/download/edit/{id}', array('uses'=>'DownloadController@edit','before'=>'auth'));
Route::post('/admin/download/edit/{id}', array('uses'=>'DownloadController@update','before'=>'auth'));
Route::get('/admin/download/{id}', array('uses'=>'DownloadController@show','before'=>'auth'));

Route::get('/admin/album/create', array('uses'=>'AlbumController@create','before'=>'auth'));	
Route::post('/admin/album/create', array('uses'=>'AlbumController@store','before'=>'auth'));
Route::get('/admin/album', array('uses'=>'AlbumController@index','before'=>'auth'));
Route::get('/admin/album/edit/{id}', array('uses'=>'AlbumController@edit','before'=>'auth'));
Route::post('/admin/album/edit/{id}', array('uses'=>'AlbumController@update','before'=>'auth'));
Route::get('/admin/album/delete/{id}', array('uses'=>'AlbumController@destroy','before'=>'auth'));

Route::get('/admin/photo/add/{id}', array('uses'=>'PhotoController@create','before'=>'auth'));
Route::post('/admin/photo/add/{id}', array('uses'=>'PhotoController@store','before'=>'auth'));
Route::get('/admin/album/photo/{id}', array('uses'=>'PhotoController@index','before'=>'auth'));
Route::get('/admin/photo/{id}', array('uses'=>'PhotoController@show','before'=>'auth'));
Route::get('/admin/photo/delete/{id}', array('uses'=>'PhotoController@destroy','before'=>'auth'));
Route::get('/admin/photo/edit/{id}', array('uses'=>'PhotoController@edit','before'=>'auth'));
Route::post('/admin/photo/edit/{id}', array('uses'=>'PhotoController@update','before'=>'auth')); 

Route::get('/admin/menu/list/{menulocation}', array('uses'=>'MenuController@index','before'=>'auth'));
Route::get('/admin/menu/create/{menulocation}', array('uses'=>'MenuController@create','before'=>'auth'));
Route::post('/admin/menu/create/{menulocation}', array('uses'=>'MenuController@store','before'=>'auth'));
Route::get('/admin/menu/edit/{id}', array('uses'=>'MenuController@edit','before'=>'auth'));
Route::post('/admin/menu/edit/{id}', array('uses'=>'MenuController@update','before'=>'auth'));
Route::get('/admin/menu/delete/{id}', array('uses'=>'MenuController@destroy','before'=>'auth'));

Route::get('/admin/denied', array('uses'=>'AuthController@denied'));
Route::get('/denied', array('uses'=>'AuthController@frontDenied'));


Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');

Route::get('/post/{id}', array('uses'=>'PostController@show'));
Route::get('/category/{id}', array('uses'=>'CategoryController@show'));
Route::get('/gallery', array('uses'=>'GalleryController@index'));
Route::get('/gallery/album/{id}', array('uses'=>'GalleryController@album'));
