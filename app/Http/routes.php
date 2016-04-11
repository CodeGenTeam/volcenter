<?php
Route::group(['middleware' => 'cors'], function() {
    Route::get('/user/logout', 'UserController@logout');
    Route::get('/user/login', 'UserController@login');
    Route::resource('/user', 'UserController', ['only' => ['create', 'show', 'update', 'destroy']]);

    Route::get('/event', 'EventController@index');
    Route::get('/event/create', 'EventController@create');
    Route::delete('/event/{event}', 'EventController@delete')->where(['event' => '\d+']);
    Route::post('/event/{event}', 'EventController@update')->where(['event' => '\d+']);

    Route::resource('/event/event_type', 'EventTypeController', ['only' => ['index', 'create', 'update', 'destroy']]);

    Route::get('/user/{user}/application', 'ApplicationsController@index')->where(['user' => '\d+']);
    Route::get('/user/{user?}/application/create', 'ApplicationsController@create')->where(['user' => '\d+']);
    Route::get('/application/{application}', 'ApplicationsController@update')->where([
        'user' => '\d+', 'application' => '\d+'
    ]);
    Route::delete('/application/{application}', 'ApplicationsController@delete')->where(['application' => '\d+']);
});