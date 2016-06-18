<?php

namespace App\AdminPanel;

use App\AdminPanel\Controllers\EventController;
use App\AdminPanel\Controllers\EventTypeController;
use App\AdminPanel\Controllers\pex\PermissionController;
use App\AdminPanel\Controllers\UserController;
use App\AdminPanel\Controllers\MotivationController;
use App\AdminPanel\Controllers\ApplicationController;
use Route;

class AdminPanel {

    private $widgets = [];
    private $links = [];

    public function routes() {
        Route::get('/adminpanel', function () { return $this->showWidgets(); });
        // заменить загрузку изображений и раскидать на функции
        Route::resource('/adminpanel/events', '\\' . EventController::class . '@index');

        Route::get('/adminpanel/event_types', '\\' . EventTypeController::class . '@index');
        Route::get('/adminpanel/users', '\\' . UserController::class . '@index');
        Route::get('/adminpanel/motivations', '\\' . MotivationController::class . '@index');

        Route::get('/adminpanel/applications/{event}', '\\' . ApplicationController::class . '@index')->where(['event' => '\d+']);
        Route::get('/adminpanel/applications/approve', '\\' . ApplicationController::class . '@approve');

        Route::get('/adminpanel/pex/', '\\' . PermissionController::class . '@groupList');
        Route::get('/adminpanel/pex/group', '\\' . PermissionController::class . '@groupManager');
        Route::get('/adminpanel/pex/group/users', '\\' . PermissionController::class . '@usersManager');
    }

    public function loadWidgets() {
        include 'AdminWidgets.php';
    }

    public function getWidgets() {
        if (!$this->widgets) $this->loadWidgets();
        foreach ($this->widgets as $widget) if (!$widget->can()) unset($widget);
        return $this->widgets;
    }

    public function getWidget($module) {
        $mods = $this->getWidgets();
        foreach ($mods as $mod) if ($mod->getName() == $module) return $mod;
        return null;
    }

    public function addWidget(Widget $module) {
        $this->widgets[] = $module;
    }

    private function showWidgets() {
        $widgets = $this->getWidgets();
        $w = [];
        foreach ($widgets as $widget) {
            if ($widget->can()) $w[] = $widget;
        }
        return view('admin_panel.widgets', ['widgets' => $w]);
    }

    public function links($links) {
        $this->links = $links;
    }

    public function getLinks() {
        if (!$this->links) $this->loadWidgets();
        return $this->links;
    }
}