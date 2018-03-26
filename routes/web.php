<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/seleccionar/proyecto/{id}','HomeController@selectProject');

Route::get('/reportar', 'IncidentController@create');
Route::post('/reportar', 'IncidentController@store');


Route::get('/ver/{id}', 'IncidentController@show');

Route::get('/incidencia/{id}/atender', 'IncidentController@take');
Route::get('/incidencia/{id}/resolver', 'IncidentController@solve');
Route::get('/incidencia/{id}/abrir', 'IncidentController@open');
Route::get('/incidencia/{id}/editar', 'IncidentController@edit');
Route::get('/incidencia/{id}/derivar', 'IncidentController@nextLevel');


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

	Route::get('/proyectos/{id}/eliminar','ProjectController@delete');
	Route::get('/proyectos/{id}/restaurar','ProjectController@restore');

	//Category
	Route::post('/categorias','CategoryController@store');
	Route::post('/categoria/editar/','CategoryController@update');
	Route::get('/categoria/{id}/eliminar','CategoryController@delete');

	//Level
	Route::post('/niveles','LevelController@store');
	Route::post('/nivel/editar','LevelController@update');
	Route::get('/nivel/{id}/eliminar','LevelController@delete');
	
	// project-User
	Route::post('/proyecto-usuario','ProjectUserController@store');
	Route::get('/proyecto-usuario/{id}/eliminar','ProjectUserController@delete');
	
	Route::get('/config', 'ConfigController@index');
});