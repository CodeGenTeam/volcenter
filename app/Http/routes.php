<?php

/* Actions Handled By Resource Controller
    Verb		Path				Action		Route Name
    GET			/photo				index		photo.index
    GET			/photo/create		create		photo.create
    POST		/photo				store		photo.store
    GET			/photo/{photo}		show		photo.show
    GET			/photo/{photo}/edit	edit		photo.edit
    PUT/PATCH	/photo/{photo}		update		photo.update PUT - require all fields, PATCH - not all
    DELETE		/photo/{photo}		destroy		photo.destroy
 */

use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\EventController;
use App\Http\Controllers\User\ProfileTypeController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\StudyController;
use App\Http\Controllers\User\LanguageLevelController;
use App\Http\Controllers\User\ApplicationController;

// IndexController
Route::get('/', '\\' . IndexController::class . '@index');
Route::get('/about', '\\' . IndexController::class . '@about');
Route::get('/how_it_works', '\\' . IndexController::class . '@works');

// UserController
Route::get('/user/save_img','\\' . UserController::class . '@saveimage');
Route::post('/user/save_img','\\' . UserController::class . '@saveimage');
Route::get('/user/remove_img','\\' . UserController::class . '@removeimage');
Route::get('/settings', '\\' . UserController::class . '@edit');
Route::delete('/user/{user}', '\\' . UserController::class . '@destroy');
Route::patch('/user/{user}', '\\' . UserController::class . '@update');
//Route::resource('/user', '\\' . UserController::class);
Route::get('/user/profile/{user}', 'UserController@show');
Route::post('/user/profile/{receiver}/message/{sender}', 'MessageController@create');

// StudyController
Route::post('/studies/{user}', ['middleware' => 'ajax', 'uses' => '\\' . StudyController::class . '@store']);
Route::delete('/studies', ['middleware' => 'ajax', 'uses' => '\\' . StudyController::class . '@destroy']);

// Profile_types
Route::get('/profile_types', ['middleware' => 'ajax', 'uses' => '\\' . ProfileTypeController::class . '@index']);

//Profiles
Route::post('/profiles', ['middleware' => 'ajax', 'uses' => '\\' . ProfileController::class . '@store']);
Route::delete('/profiles', ['middleware' => 'ajax', 'uses' => '\\' . ProfileController::class . '@destroy']);

// LanguageLevelController
Route::post('/languages', ['middleware' => 'ajax', 'uses' => '\\' . LanguageLevelController::class . '@store']);
Route::delete('/languages', ['middleware' => 'ajax', 'uses' => '\\' . LanguageLevelController::class . '@destroy']);
Route::get('/languages', ['middleware' => 'ajax', 'uses' => '\\' . LanguageLevelController::class . '@language_level']);

// AuthController
Route::get('login', '\\' . AuthController::class .'@showLoginForm');
Route::post('login', '\\' . AuthController::class .'@login');
Route::get('logout', '\\' . AuthController::class .'@logout');
Route::get('register', '\\' . AuthController::class .'@showRegistrationForm');
Route::post('register', '\\' . AuthController::class .'@register');

// PasswordController
Route::get('password/reset/{token?}', '\\'. PasswordController::class . '@showResetForm');
Route::post('password/email', '\\'. PasswordController::class . '@sendResetLinkEmail');
Route::post('password/reset', '\\'. PasswordController::class . '@reset');

// EventController
Route::get('/event', '\\' . EventController::class . '@index');
Route::post('/event/create', '\\' . EventController::class . '@create');
Route::delete('/event/{event}', '\\' . EventController::class . '@delete')->where(['event' => '\d+']);
Route::post('/event/{event}', '\\' . EventController::class . '@update')->where(['event' => '\d+']);
Route::get('/event/last', '\\' . EventController::class . '@getlast');
Route::get('/event/{event}', '\\' . EventController::class . '@show')->where(['id' => '\d+']);
Route::get('/event/list/{id}', '\\' . EventController::class . '@getList')->where(['id' => '\d+']);
Route::get('/events', '\\' . EventController::class . '@all');

Route::post('/event/{event}/applications', '\\' . ApplicationController::class .'@initial_application');

// ApplicationsController
// Route::get('/user/{user}/application', 'ApplicationController@index')->where(['user' => '\d+']);
// Route::post('/user/{user?}/application/create', 'ApplicationController@create')->where(['user' => '\d+']);
// Route::get('/application/{application}', 'ApplicationController@update')->where(['user' => '\d+', 'application' => '\d+']);
// Route::delete('/application/{application}', 'ApplicationController@delete')->where(['application' => '\d+']);
// StatusesController
//Route::resource('/user/status', 'StatusController', ['only' => ['index', 'create', 'update', 'destroy']]);
//Route::resource('/user/{user}', 'ProfileController@show');