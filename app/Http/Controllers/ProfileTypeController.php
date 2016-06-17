<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Profile_type;
use Pex;

class ProfileTypeController extends Controller
{

    private $upgradeableUserFields = ['name'];

    public function index()
    {
        $u = Profile_type::all();
        if (is_null($u)) {
            return ['success' => false, 'error' => 'types not found'];
        }
        return ['success' => true, 'types' => $u->profiles];
    }

    public function create()
    {
        Pex::requireRule('permissions.group.*');
        $data = Request::all();
        $val = Validator::make($data, [
            'name' => 'required'
        ]);
        if ($val->fails()) {
            return ['success' => false, 'error' => $val->errors()->all()];
        }
        Profile_type::create(['name' => $data['name']]);
        return ['success' => true];
    }

    public function update(Profile_type $id, Request $request)
    {
        if (is_null($id)) {
            return ['success' => false, 'error' => 'profile type not found'];
        }
        // todo запилить разрешения
        $val = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($val->fails()) {
            return ['success' => false, 'error' => $val->errors()->all()];
        }
        $updated = [];
        foreach ($request->all() as $key => $value) {
            if (in_array($key, $this->upgradeableUserFields)) {
                try {
                    $id->{$key} = $value;
                    $id->save();
                } finally {
                    $updated[] = $key;
                }
            }
        }
        return ['success' => count($updated) != 0, 'fields' => $updated];
    }

    public function delete(Profile_type $id)
    {
        if (is_null($id)) {
            return ['success' => false, 'error' => 'profile type not found'];
        }
        $id->delete();
        return ['success' => true];
    }
}
