<?php

namespace app\AdminPanel;

class AdminPanel {

    private $widgets = [];
    private $links = [];

    public function routes() {
        \Route::get('/adminpanel', function () { return $this->showWidgets(); });
        \Route::get('/adminpanel/module/{module}/{action}', function ($module, $action) {
            $controller_name = ucfirst(mb_strtolower($module)).'Controller';
            app('app\AdminPanel\Controllers\\'.$controller_name)->$action();
        });
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
        return view('ap.widgets', ['widgets' => $w]);
    }

    public function links($links) {
        $this->links = $links;
    }

    public function getLinks() {
        return $this->links;
    }
}