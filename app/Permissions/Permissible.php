<?php
namespace app\Permissions;

abstract class Permissible
{
    abstract public function can($permission, $inverse = false);
}
