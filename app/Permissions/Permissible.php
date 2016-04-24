<?php
namespace app\Permissions;

abstract class Permissible {

    protected $rules;

    public function __construct() {
        $this->rules = null;
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
}