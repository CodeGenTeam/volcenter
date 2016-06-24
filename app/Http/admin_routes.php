<?php

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

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\EventTypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MotivationController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\ResponsibilityController;

Route::get('/adminpanel', function () {
    return view('admin_panel.index');
});
// заменить загрузку изображений и раскидать на функции
Route::get('/adminpanel/events', '\\' . EventController::class . '@index');
Route::get('/adminpanel/events/{event}', '\\' . EventController::class . '@show');
Route::get('/adminpanel/event_types', '\\' . EventTypeController::class . '@index');
Route::get('/adminpanel/users', '\\' . UserController::class . '@index');
Route::get('/adminpanel/motivations', '\\' . MotivationController::class . '@index');

Route::get('/adminpanel/events/{event}/responsibilities','\\'. ResponsibilityController::class.'@index');

Route::get('/adminpanel/events/{event}/applications', '\\' . ApplicationController::class . '@show')->where(['event' => '\d+']);
Route::get('/adminpanel/applications/', '\\' . ApplicationController::class . '@index');