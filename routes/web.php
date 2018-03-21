<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/reportar', 'HomeController@getReport');
Route::post('/reportar', 'HomeController@postReport');


Route::group(['middleware' => 'admin','namespace'=>'Admin'], function () {   
	//User
	Route::get('/usuarios', 'UserController@index');
	Route::post('/usuarios', 'UserController@store');
	
	Route::get('/usuarios/{id}', 'UserController@edit');
	Route::post('/usuarios/{id}', 'UserController@update');

	Route::get('/usuarios/{id}/eliminar','UserController@delete');
	
	//Projects
	Route::get('/proyectos', 'ProjectController@index');
	Route::post('/proyectos', 'ProjectController@store');

	Route::get('/proyectos/{id}', 'ProjectController@edit');
	Route::post('/proyectos/{id}', 'ProjectController@update');

	Route::get('/projectos/{id}/eliminar','ProjectController@delete');
	
	Route::get('/config', 'ConfigController@index');
});