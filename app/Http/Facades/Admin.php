<?php

namespace App\Http\Facades;

use Illuminate\Support\Facades\Facade;
use App\Http\Services\Admin as AdminClass;

class Admin extends Facade {

    protected static function getFacadeAccessor() {
        return AdminClass::class;
    }
}