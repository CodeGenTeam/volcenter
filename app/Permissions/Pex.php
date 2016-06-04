<?php
namespace app\Permissions;

use Illuminate\Support\Facades\Facade;

class Pex extends Facade
{

    protected static function getFacadeAccessor()
    {
        return \App\Permissions\Permissions::class;
    }
}
