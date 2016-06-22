<?php

namespace App\AdminPanel;

use App\AdminPanel\Controllers\EventController;
use App\AdminPanel\Controllers\EventTypeController;
use App\AdminPanel\Controllers\UserController;
use App\AdminPanel\Controllers\MotivationController;
use App\AdminPanel\Controllers\ApplicationController;
use Route;

class AdminPanel {

    private $links = [
        [
            'id' => 'users',
            'name' => 'Пользователи',
            'link' => 'users',
        ],
        [
            'id' => 'events',
            'name' => 'Мероприятия',
            'link' => 'events',
        ],
        [
            'id' => 'event_types',
            'name' => 'Типы мероприятия',
            'link' => 'event_types',
        ],
        [
            'id' => 'motivations',
            'name' => 'Мотивации',
            'link' => 'motivations'
        ]
    ];

    public function routes() {
        Route::get('/adminpanel', function () { 
            return view('admin_panel.index');
        });
        // заменить загрузку изображений и раскидать на функции
        Route::get('/adminpanel/events', '\\' . EventController::class . '@index');
        Route::get('/adminpanel/events/{event}', '\\' . EventController::class . '@show');
        Route::get('/adminpanel/event_types', '\\' . EventTypeController::class . '@index');
        Route::get('/adminpanel/users', '\\' . UserController::class . '@index');
        Route::get('/adminpanel/motivations', '\\' . MotivationController::class . '@index');

        Route::get('/adminpanel/applications/{event}', '\\' . ApplicationController::class . '@index')->where(['event' => '\d+']);
        Route::get('/adminpanel/applications/approve', '\\' . ApplicationController::class . '@approve');
    }

    public function getLinks() {
        return $this->links;
    }
}