<?php

namespace App\Http\Controllers;

use App\Models\Event_type;
use \Illuminate\Http\Request;
use \Response;
use \Validator;

class EventTypeController extends Controller {

    private $upgradeableUserFields = ['email', 'name1', 'name2', 'name3', 'birthday', 'password'];

    public function index() {
        $t = Event_type::all();
        return Response::json(['success' => true, 'types' => $t]);
    }

    public function create(Request $response) {
        $data = $response->all();
        $val = Validator::make($data, ['name' => 'required']);
        if ($val->fails()) return Response::json(['success' => false, 'error' => $val->errors()->all()]);
        Event_type::create(['name' => $data['name']]);
        return Response::json(['success' => true]);
    }

    public function update($id, Request $request) {
        $u = Event_type::find($id);
        if (is_null($u)) return ['success' => false, 'event type not found'];
        if($request->name == "") return ['success' => false, 'name is empty or undefined'];
        // todo запилить разрешения
        $updated = [];
        /*foreach ($request as $key => $value) {
            if (in_array($key, $this->upgradeableUserFields)) {
                try {
                    $u->{$key} = $value;
                } finally {
                    $updated[] = $key;
                }
            }
        }*/
        $u->name = $request->name;
        $u->save();
        return Response::json(
            ['success' => true, 'event type was changed']
        );
        //return ['success' => count($updated) != 0, 'fields' => $updated];
    }

    public function destroy($id) {
        $u = Event_type::find($id);
        if (is_null($u)) return ['success' => false, 'event type not found'];
        // todo запилить разрешения
        try {
            $u->delete();
        } finally {
            return Response::json(['success' => true]);
        }
        return Response::json(['success' => false, 'error' => 'error']);
    }
}
