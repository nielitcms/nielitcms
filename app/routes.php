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
Route::get('/hello', 'HomeController@hello');
Route::get('/helloagain', 'HomeController@helloagain');
Route::post('/hello', 'HomeController@postHello');

Route::get('/user/create', array('uses'=>'UserController@create', 'before'=>'auth'));
Route::post('/user/create', array('uses'=>'UserController@createUser', 'before'=>'auth'));
Route::get('/user', array('uses'=>'UserController@index', 'before'=>'auth'));
Route::get('/user/delete/{id}', 'UserController@remove');
Route::get('/user/edit/{id}', array('uses'=>'UserController@edit', 'before'=>'auth'));
Route::post('/user/edit/{id}', array('uses'=>'UserController@postEdit', 'before'=>'auth'));
Route::get('/user/changepassword/{id}', array('uses'=>'UserController@ChangePassword', 'before'=>'auth'));
Route::post('/user/changepassword/{id}', array('uses'=>'UserController@PostChangePassword', 'before'=>'auth'));

Route::get('/page', 'PageController@index');
Route::get('/pageshow', 'PageController@show');

Route::get('/category/create', array('uses'=>'CategoryController@create', 'before'=>'auth'));
Route::post('/category/create', array('uses'=>'CategoryController@postCreate', 'before'=>'auth'));
Route::get('/category', 'CategoryController@index');
Route::get('/category/delete/{id}', array('uses'=>'CategoryController@remove', 'before'=>'auth'));
Route::get('/category/edit/{id}', array('uses'=>'CategoryController@edit', 'before'=>'auth'));
Route::post('/category/edit/{id}', array('uses'=>'CategoryController@postedit', 'before'=>'auth'));
// Route::get('/category/create', array('uses'=>'CategoryController@create', 'before'=>'auth'));
// Route::post('/category/create', array('uses'=>'CategoryController@postCreate', 'before'=>'auth'));
// Route::get('/category', array('uses'=>'CategoryController@index', 'before'=>'auth'));
// Route::get('/category/delete/{id}','CategoryController@remove');
// Route::get('/category/delete/{id}', array('uses'=>'CategoryController@remove', 'before'=>'auth'));


// Route::get('/album/create', 'AlbumController@create');
// Route::post('/album/create', 'AlbumController@postCreate');
// Route::get('/album', 'AlbumController@index');
// Route::get('/album/delete/{id}', 'AlbumController@remove');
// Route::get('/album/edit/{id}', array('uses'=>'AlbumController@edit', 'before'=>'auth'));
// Route::post('/album/edit/{id}', array('uses'=>'AlbumController@postedit', 'before'=>'auth'));
// Route::get('/album/description/{id}', array('uses'=>'AlbumController@postedit', 'before'=>'auth'));


Route::get('/photo/create', 'PhotoController@create');
Route::post('/photo/create', 'PhotoController@postCreate');
Route::get('/photo', 'PhotoController@index');
Route::get('/photo/delete/{id}', 'PhotoController@remove');
Route::get('photo/edit/{id}', 'PhotoController@edit');
Route::post('photo/edit/{id}', 'PhotoController@postedit');

Route::get('/comment/create', 'CommentController@create');
Route::post('/comment/create', 'CommentController@postCreate');
Route::get('/comment', 'CommentController@index');
Route::get('/comment/delete/{id}', 'CommentController@remove');

Route::get('/post/create', 'PostController@create');
Route::post('/post/create', 'PostController@store');
Route::get('/post', 'PostController@index');

Route::get('/page/create', 'PageController@create');
Route::post('/page/create', 'PageController@store');
Route::get('/page', 'PageController@index');
Route::get('/page/delete/{id}', 'PageController@remove');
// Route::get('page/edit/{id}', 'PageController@edit');
// Route::post('page/edit/{id}', 'PageController@postedit');

// Route::get('/content', 'ContentController@index');
// Route::get('/content/delete/{id}', 'ContentController@remove');


Route::post('/postuser', 'UserController@receiveUser');

Route::get('/admin', array('uses'=>'AdminController@getIndex', 'before'=>'auth'));

Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@authenticate');
Route::get('/logout', 'AuthController@logout');

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

// kan delete a kan logout chuan kan back leh a data kan delete hyn login page ah kal tho mahse kan luh leh hian a lo in delete tho hi ege chhan??







// dropdwan a gai content ah chuan..