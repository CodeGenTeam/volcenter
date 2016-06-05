<?php

namespace app\AdminPanel;

class AdminPanel {

    private $modules = [];

    public function routes() {
        \Route::get('/adminpanel', function () { return $this->showIndex(); });
    }

    public function loadModules() {
        include 'AdminModules.php';
    }

    public function getModules() {
        $this->loadModules();
        return $this->modules;
    }

    public function addModule(Module $module) {
        $this->modules[] = $module;
    }

    private function showIndex() {
        return view('ap.list', ['modules' => $this->getModules()]);
    }
}