<?php

namespace app\AdminPanel;

class AdminPanel {

    private $modules = [];

    public function routes() {
        \Route::get('/adminpanel', function () { return $this->showIndex(); });
        \Route::get('/adminpanel/module/{module}', function ($module) { return $this->showModule($module); });
    }

    public function loadModules() {
        include 'AdminModules.php';
    }

    public function getModules() {
        $this->loadModules();
        return $this->modules;
    }

    public function getModule($module) {
        $mods = $this->getModules();
        foreach ($mods as $mod) if ($mod->getName() == $module) return $mod;
        return null;
    }

    public function addModule(Module $module) {
        $this->modules[] = $module;
    }

    private function showIndex() {
        return view('ap.list', ['modules' => $this->getModules()]);
    }

    private function showModule($module) {
        return view('ap.list', ['modules' => [$this->getModule($module)]]);
    }
}