<?php
namespace App\Permissions;

abstract class RulesSet extends Permissible {

    private static $cache;

    public function __construct($rules) {
        $this->rules = $rules;
    }

    public static function fromUser($user) {
        return RulesSet::$cache['u' . $user->id] ?? RulesSet::$cache['u' . $user->id] = new UserRulesSet($user);
    }

    public static function fromGroup($group) {
        return RulesSet::$cache['g' . $group->id] ?? RulesSet::$cache['g' . $group->id] = new GroupRulesSet($group);
    }

    public function formArray($array) {
        $this->rules = $array;
    }
}