<?php
Route::get('/', function () {
    return view('frontend/layout');
});

Route::get('/user/logout', 'UserController@logout');
Route::get('/user/login', 'UserController@login');
Route::get('/user/{id}', 'UserController@show')->where(['id' => '\d+']);
Route::resource('/user', 'UserController', ['only' => ['create', 'update', 'destroy']]);

Route::get('/event', 'EventController@index');
Route::post('/event/create', 'EventController@create');
Route::delete('/event/{event}', 'EventController@delete')->where(['event' => '\d+']);
Route::post('/event/{event}', 'EventController@update')->where(['event' => '\d+']);

Route::get('/event/{id}', 'EventController@show')->where(['id' => '\d+']);
Route::get('/event/last', 'EventController@getlast');
Route::get('/event/list/{id}', 'EventController@getList')->where(['id' => '\d+']);

Route::resource('/event/event_type', 'EventTypeController', ['only' => ['index', 'update', 'destroy']]);
Route::post('/eventtype/create', 'EventTypeController@create');

Route::get('/user/{user}/application', 'ApplicationsController@index')->where(['user' => '\d+']);
Route::get('/user/{user?}/application/create', 'ApplicationsController@create')->where(['user' => '\d+']);
Route::get('/application/{application}', 'ApplicationsController@update')->where([
    'user' => '\d+', 'application' => '\d+'
]);
Route::delete('/application/{application}', 'ApplicationsController@delete')->where(['application' => '\d+']);

Route::resource('/user/status', 'StatusesController', ['only' => ['index', 'create', 'update', 'destroy']]);

Route::resource('/user/{user}/profile', 'ProfileController', ['only' => ['show', 'create', 'update', 'destroy']]);

Route::resource('/user/profile', 'ProfileTypeController', ['only' => ['index', 'create', 'update', 'destroy']]);

Pex::routes();