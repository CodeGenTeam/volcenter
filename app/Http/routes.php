<?php

Route::group(['middleware' => 'web'], function ()
{
	// *** PAGES *** //
	// main page
	Route::get('/', function ()
	{
		return view('frontend/layout');
	});

	// admin page
	Route::get('/backend', function ()
	{
		return view('backend/dashboard/index');
	});

	Route::get('/backend/events', function ()
	{
		return view('backend/events/viewAll');
	});

	//----------------------------------------------------------------------------------------------------------------//
	// *** FUNCTIONS *** //

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

	// UserController
	Route::get('/user/logout', 'UserController@logout');
	Route::get('/user/login', 'UserController@login');
	Route::get('/user/{id}', 'UserController@show')->where(['id' => '\d+']);
	Route::resource('/user', 'UserController', ['only' => ['create', 'update', 'destroy']]);

	// EventController
	Route::get('/event', 'EventController@index');
	Route::post('/event/create', 'EventController@create');
	Route::delete('/event/{event}', 'EventController@delete')->where(['event' => '\d+']);
	Route::post('/event/{event}', 'EventController@update')->where(['event' => '\d+']);
	Route::get('/event/{id}', 'EventController@show')->where(['id' => '\d+']);
	Route::get('/event/last', 'EventController@getlast');
	Route::get('/event/list/{id}', 'EventController@getList')->where(['id' => '\d+']);

	// EventTypeController
	Route::resource('/event_type', 'EventTypeController', ['only' => ['index', 'update', 'destroy']]);
	Route::post('/event_type/create', 'EventTypeController@create');

	// ApplicationsController
	Route::get('/user/{user}/application', 'ApplicationsController@index')->where(['user' => '\d+']);
	Route::get('/user/{user?}/application/create', 'ApplicationsController@create')->where(['user' => '\d+']);
	Route::get('/application/{application}', 'ApplicationsController@update')->where(['user' => '\d+', 'application' => '\d+']);
	Route::delete('/application/{application}', 'ApplicationsController@delete')->where(['application' => '\d+']);

	// StatusesController
	Route::resource('/user/status', 'StatusesController', ['only' => ['index', 'create', 'update', 'destroy']]);

	// ProfileController
	Route::resource('/user/{user}/profile', 'ProfileController', ['only' => ['show', 'create', 'update', 'destroy']]);
	Route::resource('/user/profile', 'ProfileTypeController', ['only' => ['index', 'create', 'update', 'destroy']]);

	// PermissionsController
	Pex::routes();
});