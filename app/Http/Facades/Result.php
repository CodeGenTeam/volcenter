<?php
namespace App\Http\Facades;

use Illuminate\Support\Facades\Facade;
use App\Http\Services\Result as ResultClass;

class Result extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ResultClass::class;
    }
}
