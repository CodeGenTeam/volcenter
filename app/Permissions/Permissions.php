<?php
namespace App\Permissions;

use App\Permissions\Models\Rule as MRule;
use App\User;
use Auth;

class Permissions extends Permissible {

    public function getPermissions($target = null) {
        if (is_null($target)) return $this->getCurrentUserPermissions()->getRules();
        return RulesSet::fromUser(User::find($target))->getRules();
    }

    public function getCurrentUserPermissions() {
        return RulesSet::fromUser(Auth::user());
    }

    public function getGroupList() {
        return $this->getCurrentUserPermissions()->getGroups();
    }

    public function getOrCreateRule($rule) {
        return $this->getRule($rule) ?? MRule::create(['rule' => $rule]);
    }

    public function getRule($rule) {
        if ($rule instanceof MRule) {
            return $rule;
        } elseif (is_string($rule)) {
            return MRule::where('rule', $rule);
        } else {
            return MRule::find($rule);
        }
    }

    public function requireRule($permission, $inverse = false) {
        if (!$this->can($permission, $inverse)) abort(403, 'permission denied');
    }

    public function can($permission, $inverse = false) {
        return $this->getCurrentUserPermissions()->can($permission, $inverse);
    }
}