<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Statuses;
use Illuminate\Http\Request;
use Validator;

class StatusesController extends Controller {

    private $upgradeableUserFields = ['name'];

    public function index() {
        $t = Statuses::all();
        return ['success' => true, 'types' => $t];
    }

    public function create(Request $request) {
        $data = $request->all();
        $val = Validator::make($data, ['name' => 'required']);
        if ($val->fails()) return ['success' => false, 'error' => $val->errors()->all()];
        Statuses::create(['name' => $data['name']]);
        return ['success' => true];
    }

    public function update(Statuses $id, Request $request) {
        if (is_null($id)) return ['success' => false, 'status not found'];
        // todo запилить разрешения
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

    public function destroy(Statuses $id) {
        if (is_null($id)) return ['success' => false, 'status not found'];
        // todo запилить разрешения
        try {
            $id->delete();
        } finally {
            return ['success' => true];
        }
    }
}
