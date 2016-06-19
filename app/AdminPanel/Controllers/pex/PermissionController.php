<?php

namespace App\AdminPanel\Controllers\pex;

use App\Http\Controllers\Controller;
use App\Permissions\Models\Group_permission as MGroup;
use App\Permissions\Models\Permission as MRule;
use Illuminate\Http\Request;
use Ret;
use Pex;

class PermissionController extends Controller {

    public $fixedPermissions = [
        'admin' => ['*'],

    ];

    public function groupList() {
        return view('admin_panel.pex.groups', ['groups' => MGroup::all()]);
    }

    public function groupManager(Request $req) {
        if ($req->ajax()) return $this->groupAction($req->all()['action'] ?? null, $req);
        $id = $req->all()['group'] ?? null;
        if (!$id) return redirect('/adminpanel/pex/');
        $group = MGroup::where(['id' => $id])->first();
        if (!$group) return redirect('/adminpanel/pex/');
        return view('admin_panel.pex.groupManager', ['group' => $group, 'fixed' => $this->fixedPermissions[$group->name]]);
    }

    private function groupAction($action, Request $req) {
        switch ($action) {
            case 'remove':
                return $this->removeGroupRule($req);
                break;
            default:
                return Ret::fail();
        }
    }

    private function removeGroupRule(Request $req) {
        $rule = MRule::find($req->all()['ruleId']);
        $group = MGroup::find($req->all()['groupId']);
        if (!$rule || !$group) return abort(400);
        if (in_array($rule->rule, $this->fixedPermissions[$group->name] ?? [])) return abort(400);
        return Ret::ret(Pex::groupRules($group)->removeRule($rule), [], $group);
    }

    public function usersManager(Request $req) {
        // TODO тут ничего нет. нет, не надо ничего сюда писать самому. я приду и сам всё запилю
    }
}