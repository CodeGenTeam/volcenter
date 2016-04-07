<?php

Route::get('/', function () {
    return view('index');
    //Auth::login($user);
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/event/{id}', function ($id) {
    return View::make('event', [
        'id' => $id
    ]);
});

// only admin
Route::get('/eventcreate', function () {
    return view('eventcreate');
});

// only auth users
Route::get('/settings', function () {
    return view('settings');
});

//
Route::get('/exit', function () {
    Auth::logout();
    return redirect('/');
});

//user profile
Route::get('/user/{id}', function($id) { ////'Auth\AuthController@postRegister');
    return View::make('user', [
        'id' => $id
    ]);
});

Route::get('/list', 'EventController@index');
Route::get('/list{page}', 'EventController@page')->where(['page' => '\d+']);

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/home', function () {
            return view('home');
        });


    });
});
