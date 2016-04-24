<?php
namespace app\Permissions;

use App\User as MUser;

class UserRulesSet extends RulesSet {

    protected $user;

    public function __construct($user) {
        if (!($user instanceof MUser)) $user = MUser::find($user);
        if (is_null($user)) {
            $this->clear();
        } else {
            $this->user = $user;
        }
    }

    public function getGroups() {
        foreach ($this->user->belongsToMany('App\Permissions\Models\Group', 'UserGroupAccessory', 'user_id', 'group_id', 'id')->get()->all() as $group) {
            $groups[] = $group->name;
        }
        return $groups;
    }

    protected function parseRules() {
        $this->parseUserPermission();
        $this->parseGroupPermissions();
    }

    private function parseUserPermission() {
        $arr = $this->user->hasMany('App\Permissions\Models\UserPermission', 'user_id', 'id')->get()->all();
        foreach ($arr as $rule) $this->add($rule->rule->rule);
    }

    private function parseGroupPermissions() {
        $groups = $this->user->belongsToMany('App\Permissions\Models\Group', 'UserGroupAccessory', 'user_id', 'group_id', 'id')->get()->all();
        foreach ($groups as $group) {
            $this->add('group.' . $group->name);
            foreach ($group->rules()->get()->all() as $rule) $this->add($rule->rule);
        }
    }
}