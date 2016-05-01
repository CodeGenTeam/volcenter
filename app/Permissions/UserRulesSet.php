<?php
namespace app\Permissions;

use App\Permissions\Models\Group as MGroup;
use app\Permissions\Models\UserGroupAccessory;
use app\Permissions\Models\UserPermission;
use App\User as MUser;
use Auth;
use Illuminate\Database\Eloquent\Collection;
use Pex;

class UserRulesSet extends RulesSet {

    private static $ONLY_ONE_GROUP_MODE = true;
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

    public function addRule($rule) {
        Pex::requireRule('permissions.user.rule.add');
        $rule = Pex::getOrCreateRule($rule);
        $permission = UserPermission::create([
            'user_id' => $this->user->id, 'permission_id' => $rule->id,
            'created_by' => Auth::check() ? Auth::user()->id : -1
        ]);
        if (!is_null($permission)) return true;
        return false;
    }

    public function removeRule($rule) {
        Pex::requireRule('permissions.user.rule.remove');
        $permission = UserPermission::where('permission_id', Pex::getRule($rule)->first()->id);
        return $permission->delete() > 0; // если удалено более одного разрешения
    }

    public function setGroup($group) {
        Pex::requireRule('permissions.user.group.set');
        $groups = UserGroupAccessory::where('user_id', $this->id)->get();
        if (UserRulesSet::$ONLY_ONE_GROUP_MODE) $this->trimGroups($groups);
        if (!($group instanceof MGroup)) $group = MGroup::find($group) ?? MGroup::where('name', $group)->first();
        if (is_null($group)) return false;
        if ($groups->count() > 0) {
            if (UserRulesSet::$ONLY_ONE_GROUP_MODE) {
                $target = $groups->first();
                if ($target->update(['group_id' => $group->id])) return true;
            } else {
                return UserGroupAccessory::create([
                    'user_id' => $this->id, 'group_id' => $group->id,
                    'created_by' => Auth::check() ? Auth::user()->id : -1
                ]) ? true : false;
            }
        } else {
            return UserGroupAccessory::create([
                'user_id' => $this->id, 'group_id' => $group->id, 'created_by' => Auth::check() ? Auth::user()->id : -1
            ]) ? true : false;
        }
    }

    private function trimGroups(Collection &$groups) {
        if (UserRulesSet::$ONLY_ONE_GROUP_MODE && $groups->count() > 1) for ($i = 0; $i > $groups->count(); $i++) if ($i > 0) $groups->get()->get($i)->delete();
    }

    public function removeGroup($group = null) {
        Pex::requireRule('permissions.user.group.remove');
        if (is_null($group)) return UserGroupAccessory::where('user_id', $this->id)->delete() > 0;
        if (!($group instanceof MGroup)) $group = MGroup::find($group) ?? MGroup::where('name', $group)->first();
        return UserGroupAccessory::where(['user_id' => $this->id, 'group_id' => $group->id])->delete() > 0;
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