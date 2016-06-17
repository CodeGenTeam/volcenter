<?php
namespace App\Http\Facades;

use Illuminate\Support\Facades\Facade;
use App\Http\ReturnUtil;

class Ret extends Facade
{

    protected static function getFacadeAccessor()
    {
        return ReturnUtil::class;
    }
}
