<?php
namespace App\Permissions;

use App\Models\Users as MUser;
use App\Permissions\Models\Group as MGroup;

abstract class RulesSet extends Permissible {

    private static $cache = [];
    protected $rules;

    public function __construct($rules = null) {
        $this->rules = $rules;
    }

    public static function fromUser($user) {
        if ($user instanceof MUser) {
            return RulesSet::$cache['u' . $user->login] ?? RulesSet::$cache['u' . $user->login] = new UserRulesSet($user);
        } else {
            return RulesSet::$cache['u' . $user] ?? RulesSet::$cache['u' . $user] = new UserRulesSet($user);
        }
    }

    public static function fromGroup($group) {
        if ($group instanceof MGroup) {
            return RulesSet::$cache['g' . $group->name] ?? RulesSet::$cache['g' . $group->name] = new GroupRulesSet($group);
        } else {
            return RulesSet::$cache['g' . $group] ?? RulesSet::$cache['g' . $group] = new GroupRulesSet($group);
        }

    }

    public function formArray($array) {
        $this->rules = $array;
    }

    public function can($permission, $inverse = false) {
        $can = false;
        foreach ($this->getRules() as $rule) {
            if ($can = $this->matchRule($permission, $rule)) break;
        }
        return $inverse ? !$can : $can;
    }

    public function getRules() {
        if (is_null($this->rules)) $this->parseRules();
        return $this->rules;
    }

    protected abstract function parseRules();

    private function matchRule($matcher, $my) {
        $my = explode('.', $my);
        $matcher = explode('.', $matcher);
        $i = 0;
        for (; count($matcher) > $i; $i++) {
            if (!isset($my[$i])) return false;
            if ($my[$i] == '*') return true;
            if ($my[$i] == $matcher[$i]) continue;
            return false;
        }
        return isset($my[$i]) ? false : true;
    }

    public function add($rule) {
        if (is_null($this->rules)) $this->clear();
        if (is_array($rule)) foreach ($rule as $r) $this->add($r);
        $this->rules[] = $rule;
    }

    public function clear() {
        $this->rules = [];
    }

    public abstract function addRule($rule);

    public abstract function removeRule($rule);

    public function cleanup() {
    }
}