<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/list', 'EventController@index');
Route::get('/lol', 'EventController@lol');
Route::get('/list{page}', 'EventController@page')->where(['page' => '\d+']);

Route::group(['middleware' => 'web'], function () {

    // добавляем стандартные страницы индентификации пользователей
    Route::auth();

    /*
     * Для входа на следующие страницы потребуется войти
     */
    Route::group(['middleware' => 'auth'], function () {

        Route::get('/home', function () {
            return view('home');
        });
    });
});
