<?php

Route::get('/', function() {
	return 3;
});

Route::get('/user/logout', 'UserController@logout');
Route::get('/user/login', 'UserController@login');
Route::resource('/user', 'UserController', ['only' => ['create', 'show', 'update', 'destroy']]);

Route::get('/event', 'EventController@index');
Route::get('/event/create', 'EventController@create');
Route::delete('/event/{event}', 'EventController@delete')->where(['event' => '\d+']);
Route::post('/event/{event}', 'EventController@update')->where(['event' => '\d+']);
