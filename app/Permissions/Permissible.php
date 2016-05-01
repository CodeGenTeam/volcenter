<?php
namespace app\Permissions;

abstract class Permissible {
    public abstract function can($permission, $inverse = false);
}