<?php
namespace app\Permissions;

use App\Models\User as MUser;
use App\Permissions\Models\Group as MGroup;
use App\Permissions\Models\UserGroupAccessory as MUserGroupAccessory;
use App\Permissions\Models\UserPermission as MUserPermission;
use Auth;
use Illuminate\Database\Eloquent\Collection;

class UserRulesSet extends RulesSet
{

    public static $ONLY_ONE_GROUP_MODE = true;
    protected $user;

    public function __construct($user)
    {
        if (!($user instanceof MUser)) {
            $user = MUser::find($user) ?? MUser::where('login', $user)->first();
        }
        $this->user = $user ?? new MUser(['id' => 0, 'login' => 'guest']);
    }

    public function getGroups()
    {
        $groups = [];
        foreach ($this->user->belongsToMany(MGroup::class, 'UserGroupAccessory', 'user_id', 'group_id', 'id')->get()->all() as $group) {
            $groups[] = $group->name;
        }
        if (count($groups) == 0 && $guest = MGroup::where('name', 'guest')->first()->name) {
            $groups[] = $guest;
        }
        return $groups;
    }

    public function addRule($rule)
    {
        Pex::requireRule('permissions.user.rule.add');
        $rule = Pex::getOrCreateRule($rule);
        $permission = MUserPermission::create([
            'user_id' => $this->user->id, 'permission_id' => $rule->id,
            'created_by' => Auth::check() ? Auth::user()->id : -1
        ]);
        if (!is_null($permission)) {
            return true;
        }
        return false;
    }

    public function removeRule($rule)
    {
        Pex::requireRule('permissions.user.rule.remove');
        $permission = MUserPermission::where('permission_id', Pex::getRule($rule)->first()->id);
        return $permission->delete() > 0; // если удалено более одного разрешения
    }

    public function setGroup($group)
    {
        Pex::requireRule('permissions.user.group.set');
        $groups = MUserGroupAccessory::where('user_id', $this->id)->get();
        if (UserRulesSet::$ONLY_ONE_GROUP_MODE) {
            $this->trimGroups($groups);
        }
        if (!($group instanceof MGroup)) {
            $group = MGroup::find($group) ?? MGroup::where('name', $group)->first();
        }
        if (is_null($group)) {
            return false;
        }
        if ($groups->count() > 0) {
            if (UserRulesSet::$ONLY_ONE_GROUP_MODE) {
                $target = $groups->first();
                if ($target->update(['group_id' => $group->id])) {
                    return true;
                }
            } else {
                return MUserGroupAccessory::create([
                    'user_id' => $this->id, 'group_id' => $group->id,
                    'created_by' => Auth::check() ? Auth::user()->id : -1
                ]) ? true : false;
            }
        } else {
            return MUserGroupAccessory::create([
                'user_id' => $this->id, 'group_id' => $group->id, 'created_by' => Auth::check() ? Auth::user()->id : -1
            ]) ? true : false;
        }
    }

    private function trimGroups(Collection &$groups)
    {
        if (UserRulesSet::$ONLY_ONE_GROUP_MODE && $groups->count() > 1) {
            for ($i = 0; $i > $groups->count(); $i++) {
                if ($i > 0) {
                    $groups->get()->get($i)->delete();
                }
            }
        }
    }

    public function removeGroup($group = null)
    {
        Pex::requireRule('permissions.user.group.remove');
        if (is_null($group)) {
            return MUserGroupAccessory::where('user_id', $this->id)->delete() > 0;
        }
        if (!($group instanceof MGroup)) {
            $group = MGroup::find($group) ?? MGroup::where('name', $group)->first();
        }
        return MUserGroupAccessory::where(['user_id' => $this->id, 'group_id' => $group->id])->delete() > 0;
    }

    protected function parseRules()
    {
        $this->parseUserPermission();
        $this->parseGroupPermissions();
    }

    private function parseUserPermission()
    {
        if (Pex::isAdminMode()) {
            $this->add('*');
        }
        $arr = $this->user->hasMany(MUserPermission::class, 'user_id', 'id')->get()->all();
        foreach ($arr as $rule) {
            $this->add($rule->rule->rule);
        }
    }

    private function parseGroupPermissions()
    {
        $groups = $this->user->belongsToMany(MGroup::class, 'UserGroupAccessory', 'user_id', 'group_id', 'id')->get()->all();
        if (count($groups) == 0) {
            $this->assignGroup($groups);
        }
        foreach ($groups as $group) {
            $this->add('group.' . $group->name);
            foreach ($group->rules()->get()->all() as $rule) {
                $this->add($rule->rule);
            }
        }
    }

    private function assignGroup(&$groups)
    {
        if (Auth::guest()) {
            $groups[] = MGroup::where('name', 'guest')->firstOrCreate(['name' => 'guest']);
        } else {
            $groups[] = $group = MGroup::where('name', 'user')->firstOrCreate(['name' => 'user']);
            Pex::sudo(function () {
                $this->setGroup('user');
            });
        }
    }
}
