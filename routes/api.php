<?php

use Illuminate\Http\Request;

Route::get('/proyecto/{id}/niveles','Admin\LevelController@byProject');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

