<?php
namespace App\Permissions;

abstract class Permissible {
    public abstract function can($permission, $inverse = false);
}