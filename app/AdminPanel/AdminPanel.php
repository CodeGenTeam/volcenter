<?php

namespace app\AdminPanel;

class AdminPanel {

    private $modules = [];
    private $onIndex = [];

    public function routes() {
        \Route::get('/adminpanel', function () { return $this->showIndex(); });
        \Route::get('/adminpanel/module/{module}', function ($module) { return $this->showModule($module); });
    }

    public function loadModules() {
        include 'AdminModules.php';
    }

    public function getModules() {
        if (!$this->modules) $this->loadModules();
        for ($i = 0; count($this->modules) > $i; $i++) if (!$this->modules[$i]->can()) unset($this->modules[$i]);
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
        if (!$this->modules) $this->loadModules();
        $mods = [];
        foreach ($this->onIndex as $mod) {
            $mod = $this->getModule($mod);
            if (!$mod) continue;
            if ($mod->can()) $mods[] = $mod;
        }
        return view('ap.list', ['modules' => $mods]);
    }

    private function showModule($module) {
        return view('ap.list', ['modules' => [$this->getModule($module)], 'selected' => $module]);
    }

    public function showOnIndexPage($modules) {
        $this->onIndex = $modules;
    }
}