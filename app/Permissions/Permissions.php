<?php
namespace App\Permissions;

use App\Permissions\Models\Rule as MRule;
use App\Models\User;
use Auth;
use Route;

class Permissions extends Permissible {

    private $isAdminMode = false;

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
        return $this->getRule($rule)->first() ?? MRule::create(['rule' => $rule]);
    }

    public function setupAdminMode($mode = true) {
        return $this->isAdminMode = $mode;
    }

    public function isAdminMode() {
        return $this->isAdminMode;
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
        if (!$this->can($permission, $inverse)) abort(403, 'permission denied. [' . $permission . ']');
    }

    public function can($permission, $inverse = false) {
        if ($this->isAdminMode()) return !$inverse;
        return $this->getCurrentUserPermissions()->can($permission, $inverse);
    }

    public function routes() {
        Route::get('/pex/user/can/{permission}/{user?}', 'PermissionsController@can');
        Route::get('/pex/user/rules/{user?}', 'PermissionsController@rules');
        Route::get('/pex/user/addrule/{permission}/{user}', 'PermissionsController@addUserRule');
        Route::get('/pex/user/removerule/{permission}/{user}', 'PermissionsController@removeUserRule');
        Route::get('/pex/user/group/{user?}', 'PermissionsController@group');

        Route::get('/pex/group/create/{name}', 'PermissionsController@createGroup'); // создание группы с именем name
        Route::get('/pex/group/remove/{name}', 'PermissionsController@removeGroup');
        Route::get('/pex/group/{group?}', 'PermissionsController@groupInfo'); // получить инфу о группе (если group null -- получить инфу о твоеё первой группе)
        Route::get('/pex/group/addrule/{permission}/{group}', 'PermissionsController@addGroupRule');
        Route::get('/pex/group/removerule/{permission}/{group}', 'PermissionsController@removeGroupRule');
    }
}