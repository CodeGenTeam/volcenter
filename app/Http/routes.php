<?php

Route::get('/user/logout', 'UserController@logout');
Route::get('/user/login', 'UserController@login');
Route::resource('/user', 'UserController', ['only' => ['create', 'show', 'update', 'destroy']]);