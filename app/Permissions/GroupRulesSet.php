<?php
namespace app\Permissions;

use App\Permissions\Models\Group as MGroup;

class GroupRulesSet extends RulesSet {

    protected $group;

    public function __construct($group) {
        if (!($group instanceof MGroup)) $group = MGroup::find($group);
        if (is_null($group)) {
            $this->rules = [];
        } else {
            $this->group = $group;
        }
    }

    protected function parseRules() {
        foreach ($this->group->rules()->get()->all() as $rule) $this->add($rule->rule);
    }
}