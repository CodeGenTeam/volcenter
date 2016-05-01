<?php
namespace App\Permissions;


use App\User;
use Auth;

class Permissions extends Permissible {

    public function can($permission, $inverse = false) {
        return $this->getCurrentUserPermissions()->can($permission, $inverse);
    }

    public function getCurrentUserPermissions() {
        return RulesSet::fromUser(Auth::user());
    }

    public function getPermissions($target = null) {
        if (is_null($target)) return $this->getCurrentUserPermissions()->getRules();
        return RulesSet::fromUser(User::find($target))->getRules();
    }

    public function getGroupList() {
        return $this->getCurrentUserPermissions()->getGroups();
    }
}