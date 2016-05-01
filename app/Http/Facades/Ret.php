<?php
namespace App\Http\Facades;


use Illuminate\Support\Facades\Facade;

class Ret extends Facade {

    protected static function getFacadeAccessor() {
        return 'ReturnUtil';
    }
}