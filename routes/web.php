<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/reportar', 'HomeController@getReport');
Route::post('/reportar', 'HomeController@postReport');


Route::group(['middleware' => 'admin','namespace'=>'Admin'], function () {
	Route::get('/usuarios', 'UserController@index');
	Route::post('/usuarios', 'UserController@store');
	
	Route::get('/usuarios/{id}', 'UserController@edit');
	Route::post('/usuarios/{id}', 'UserController@update');
	
	Route::get('/proyectos', 'ProjectController@index');
	Route::get('/config', 'ConfigController@index');
});