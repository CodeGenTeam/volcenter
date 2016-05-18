<?php

namespace App\Http\Controllers;

use App\Applications;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Http\Request;
use Response;
use Validator;

class ApplicationsController extends Controller {

    private $upgradeableUserFields = ['status_id'];

    public function index(User $id) {
        if (is_null($id)) return Response::json(['success' => false, 'error' => 'user not found']);
        return Response::json(['success' => true, 'applications' => $id->applications()]);
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

    public function update(Applications $id, Request $request) {
        if (is_null($id)) return ['success' => false, 'error' => 'user not found'];
        // todo запилить разрешения
        $val = Validator::make($request->all(), [
            'status_id' => 'exists:statuses,id'
        ]);
        if ($val->fails()) return Response::json(['success' => false, 'error' => $val->errors()->all()]);
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

    public function delete(Applications $id) {
        if (is_null($id)) return Response::json(['success' => false, 'error' => 'application not found']);
        $id->delete();
        return Response::json(['success' => true]);
    }
}
