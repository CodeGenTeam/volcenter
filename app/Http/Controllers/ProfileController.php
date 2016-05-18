<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Profiles;
use App\Models\User;
use Request;
use Validator;

class ProfileController extends Controller {

    private $upgradeableUserFields = ['link', 'profile_type_id'];

    public function show($user) {
        $u = User::find($user);
        if (is_null($u)) return ['success' => false, 'error' => 'user not found'];
        return ['success' => true, 'profiles' => $u->profiles];
    }

    public function create($user) {
        $data = Request::all();
        if (!isset($data['user_id'])) $data['user_id'] = $user;
        $val = Validator::make($data, [
            'user_id' => 'required|exists:users,id', 'profile_type_id' => 'required|exists:users,id',
            'link' => 'required'
        ]);
        if ($val->fails()) return ['success' => false, 'error' => $val->errors()->all()];
        Profiles::create([
            'user_id' => $data['user_id'], 'event_id' => $data['event_id'], 'status_id' => $data['status_id']
        ]);
        return ['success' => true];
    }

    public function update($user, $id, Request $request) {
        $u = Profiles::find($id);
        if (is_null($u)) return ['success' => false, 'error' => 'profile not found'];
        // todo запилить разрешения
        $val = Validator::make($request->all(), [
            'profile_type_id' => 'exists:profiles_types,id'
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
        $u = Profiles::find($id);
        if (is_null($u)) return ['success' => false, 'error' => 'profile not found'];
        $u->delete();
        return ['success' => true];
    }
}
