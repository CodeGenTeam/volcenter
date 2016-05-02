<?php
namespace App\Http\Controllers;


use App\Permissions\Models\Group as MGroup;
use App\Permissions\Models\GroupPermission as MGroupPermission;
use App\Permissions\RulesSet;
use app\Permissions\UserRulesSet;
use Auth;
use Illuminate\Routing\Controller;
use Pex;
use Ret;
use Validator;

class PermissionsController extends Controller {

    public function can($permission, $user = null) {
        Pex::requireRule('permissions.user.rule.check' . ($user ? '.other' : ''));
        return Ret::success(['can' => ($user ? RulesSet::fromUser($user)->can($permission) : Pex::can($permission))]);
    }

    public function rules($user = null) {
        Pex::requireRule('permissions.user.rule.get' . ($user ? '.other' : ''));
        return Ret::success(['rules' => $user ? RulesSet::fromUser($user)->getRules() : Pex::getCurrentUserPermissions()->getRules()]);
    }

    public function group($user = null) {
        Pex::requireRule('permissions.user.group.get' . ($user ? '.other' : ''));
        $groups = $user ? RulesSet::fromUser($user)->getGroups() : Pex::getGroupList();
        return Ret::success(['group' => UserRulesSet::$ONLY_ONE_GROUP_MODE ? $groups[0] : $groups]);
    }

    public function addUserRule($permission, $user) {
        Pex::requireRule('permissions.user.rule.add');
        $rules = RulesSet::fromUser($user);
        //if ($rules->can($permission)) return Ret::fail('user already have that permission');
        return Ret::ret($rules->addRule($permission));
    }

    public function removeUserRule($permission, $user) {
        Pex::requireRule('permissions.user.rule.remove');
        $rules = RulesSet::fromUser($user);
        return Ret::ret($rules->removeRule($permission));
    }

    public function groupInfo($group = null) {
        Pex::requireRule('permissions.group.info' . ($group ? '.other' : ''));
        return Ret::success(['group' => !$group ? MGroup::where('name', Pex::getGroupList()[0])->first() : (MGroup::find($group) ?? MGroup::where('name', $group)->first())]);
    }

    public function addGroupRule($permission, $group) {
        Pex::requireRule('permissions.group.rule.add');
        return Ret::ret(RulesSet::fromGroup($group)->addRule($permission));
    }

    public function removeGroupRule($permission, $group) {
        Pex::requireRule('permissions.group.rule.remove');
        return Ret::ret(RulesSet::fromGroup($group)->removeRule($permission));
    }

    public function createGroup($name) {
        Pex::requireRule('permissions.group.create');
        $v = Validator::make(['name' => $name], ['name' => 'required|max:255']);
        if ($v->fails()) return Ret::fail($v->errors());
        return Ret::ret(MGroup::create(['name' => $name, 'created_by' => Auth::check() ? Auth::user()->id : -1]));
    }

    public function removeGroup($name) {
        Pex::requireRule('permissions.group.remove');
        $group = MGroup::find($name) ?? MGroup::where('name', $name)->first();
        MGroupPermission::where('group_id', $group->id)->delete();
        $group->delete();
        return Ret::success();
    }

}