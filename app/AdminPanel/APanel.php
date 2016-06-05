<?php

namespace app\AdminPanel;


use Illuminate\Support\Facades\Facade;

class APanel extends Facade {

    protected static function getFacadeAccessor() {
        return 'AdminPanel';
    }
}