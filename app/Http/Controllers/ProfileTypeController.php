<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Profiles_types;

class ProfileTypeController extends Controller {

    private $upgradeableUserFields = ['name'];

    public function index() {
        $u = Profiles_types::all();
        if (is_null($u)) return ['success' => false, 'error' => 'types not found'];
        return ['success' => true, 'types' => $u->profiles];
    }

    public function create() {
        $data = Request::all();
        $val = Validator::make($data, [
            'name' => 'required'
        ]);
        if ($val->fails()) return ['success' => false, 'error' => $val->errors()->all()];
        Profiles_types::create(['name' => $data['name']]);
        return ['success' => true];
    }

    public function update($id, Request $request) {
        $u = Profiles_types::find($id);
        if (is_null($u)) return ['success' => false, 'error' => 'profile type not found'];
        // todo запилить разрешения
        $val = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($val->fails()) return ['success' => false, 'error' => $val->errors()->all()];
        $updated = [];
        foreach ($request->all() as $key => $value) {
            if (in_array($key, $this->upgradeableUserFields)) {
                try {
                    $u->{$key} = $value;
                    $u->save();
                } finally {
                    $updated[] = $key;
                }
            }
        }
        return ['success' => count($updated) != 0, 'fields' => $updated];
    }

    public function delete($id) {
        $u = Profiles_types::find($id);
        if (is_null($u)) return ['success' => false, 'error' => 'profile type not found'];
        $u->delete();
        return ['success' => true];
    }
}
