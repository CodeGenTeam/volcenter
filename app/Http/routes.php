<?php

Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
        return view('frontend/layout');
    });

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

    // PermissionsController - Doesn't need if you use laravel models in controller
    Pex::routes();
   
    // Admin panel
    APanel::routes();

    // Admin panel event
    Route::resource('/adminpanel/events', '\app\AdminPanel\Controllers\EventsController@index');
});
