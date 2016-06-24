<?php

namespace App\Http\Facades;

use Illuminate\Support\Facades\Facade;
use App\Http\AdminPanel;

class APanel extends Facade {

    protected static function getFacadeAccessor() {
        return AdminPanel::class;
    }
}