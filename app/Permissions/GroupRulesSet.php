<?php
namespace app\Permissions;

use App\Permissions\Models\Group as MGroup;
use app\Permissions\Models\GroupPermission;
use Pex;

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

    public function addRule($rule) {
        Pex::requireRule('permissions.group.rule.add');
        $rule = Pex::getOrCreateRule($rule);
        $permission = GroupPermission::create([
            'group_id' => $this->user->id, 'permission_id' => $rule->id,
            'created_by' => Auth::check() ? Auth::user()->id : -1
        ]);
        if (!is_null($permission)) return true;
        return false;
    }

    public function removeRule($rule) {
        Pex::requireRule('permissions.group.rule.remove');
        $permission = GroupPermission::where('permission_id', Pex::getRule($rule)->first()->id);
        return $permission->delete() > 0; // если удалено более одного разрешения
    }

    protected function parseRules() {
        foreach ($this->group->rules()->get()->all() as $rule) $this->add($rule->rule);
    }
}