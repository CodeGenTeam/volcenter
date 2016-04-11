<?php

namespace App\Http\Controllers;

use App\Applications;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Response;
use Validator;

class ApplicationsController extends Controller {

    private $upgradeableUserFields = ['status_id'];

    public function index($id) {
        $u = User::find($id);
        if (is_null($u)) return Response::json(['success' => false, 'error' => 'user not found']);
        return Response::json(['success' => true, 'applications' => $u->applications]);
    }

    public function create($id, Request $req) {
        $data = $req->all();
        if (!is_null($id)) $data['user_id'] = $id;
        $val = Validator::make($data, [
            'user_id' => 'required|exists:users,id', 'event_id' => 'required|exists:events,id',
            'status_id' => 'required|exists:statuses,id'
        ]);
        if ($val->fails()) return Response::json(['success' => false, 'error' => $val->errors()->all()]);
        Applications::create([
            'user_id' => $data['user_id'], 'event_id' => $data['event_id'], 'status_id' => $data['status_id']
        ]);
        return Response::json(['success' => true]);
    }

    public function update($id, Request $request) {
        $u = Applications::find($id);
        if (is_null($u)) return ['success' => false, 'error' => 'user not found'];
        // todo запилить разрешения
        $val = Validator::make($request->all(), [
            'status_id' => 'exists:statuses,id'
        ]);
        if ($val->fails()) return Response::json(['success' => false, 'error' => $val->errors()->all()]);
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
        $u = Applications::find($id);
        if (is_null($u)) return Response::json(['success' => false, 'error' => 'application not found']);
        $u->delete();
        return Response::json(['success' => true]);
    }
}
