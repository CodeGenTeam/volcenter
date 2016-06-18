<?php

Route::get('/', 'IndexController@index');

/* Actions Handled By Resource Controller
    Verb		Path				Action		Route Name
    GET			/photo				index		photo.index
    GET			/photo/create		create		photo.create
    POST		/photo				store		photo.store
    GET			/photo/{photo}		show		photo.show
    GET			/photo/{photo}/edit	edit		photo.edit
    PUT/PATCH	/photo/{photo}		update		photo.update
    DELETE		/photo/{photo}		destroy		photo.destroy
 */
// API
Route::resource('/api/event_type', 'API\APIEventTypeController');
// EventTypeController
Route::resource('/event_type', 'EventTypeController');

// UserController
Route::get('/settings', 'UserController@edit');
Route::put('/user/{user}', 'UserController@update');
Route::resource('/user', 'UserController');

// Auth
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');

Route::get('password/reset/{token?}', 'Auth/PasswordController@showResetForm');
Route::post('password/email','Auth/PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth/PasswordController@reset');

// EventController
Route::get('/event', 'EventController@index');
Route::post('/event/create', 'EventController@create');
Route::delete('/event/{event}', 'EventController@delete')->where(['event' => '\d+']);
Route::post('/event/{event}', 'EventController@update')->where(['event' => '\d+']);
Route::get('/event/last', 'EventController@getlast');
Route::get('/event/{event}', 'EventController@show')->where(['id' => '\d+']);
Route::get('/event/list/{id}', 'EventController@getList')->where(['id' => '\d+']);

// ApplicationsController
Route::get('/user/{user}/application', 'ApplicationController@index')->where(['user' => '\d+']);
Route::get('/user/{user?}/application/create', 'ApplicationController@create')->where(['user' => '\d+']);
Route::get('/application/{application}', 'ApplicationController@update')->where(['user' => '\d+', 'application' => '\d+']);
Route::delete('/application/{application}', 'ApplicationController@delete')->where(['application' => '\d+']);

// StatusesController
Route::resource('/user/status', 'StatusController', ['only' => ['index', 'create', 'update', 'destroy']]);

// ProfileController
Route::resource('/user/{user}/profile', 'ProfileController', ['only' => ['show', 'create', 'update', 'destroy']]);
Route::resource('/user/profile', 'ProfileTypeController', ['only' => ['index', 'create', 'update', 'destroy']]);

// PermissionsController - Doesn't need if you use laravel models in controller
Pex::routes();

// Admin panel
APanel::routes();
Route::get('/home', 'IndexController@index');