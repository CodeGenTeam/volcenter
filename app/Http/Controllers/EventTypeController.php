<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_type;
use Illuminate\Http\Request;
use Response;

//use Validator;

class EventTypeController extends Controller
{

    //private $upgradeableUserFields = ['email', 'name1', 'name2', 'name3', 'birthday', 'password'];

    // TODO: View со всеми записями
    public function index()
    {
        $event_type = Event_type::all();
        return View('event.event_type.index', compact('event_type'));
    }
    // TODO: View создания новой записи
    public function create()
    {
        /*$data = $response->all();
        $val = Validator::make($data, ['name' => 'required']);
        if ($val->fails()) return Response::json(['success' => false, 'error' => $val->errors()->all()]);
        Events_type::create(['name' => $data['name']]);
        return Response::json(['success' => true]);*/
    }
    // TODO: запрос создания новой записи
    public function store(Request $request)
    {
    }
    // TODO: страница показа записи
    public function show(Event_type $id)
    {
    }
    // TODO: страница редактирования записи
    public function edit(Event_type $id)
    {
    }
    // TODO: запрос обновления записи
    public function update(Event_type $id, Request $request)
    {
        if (is_null($id)) {
            return ['success' => false, 'event type not found'];
        }
        if ($request->get("name")) {
            return ['success' => false, 'name is empty or undefined'];
        }
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
        $id->name = $request->get("name");
        $id->save();
        return Response::json(
            ['success' => true, 'event type was changed']
        );
        //return ['success' => count($updated) != 0, 'fields' => $updated];
    }
    // TODO: запрос удаления записи
    public function destroy($id)
    {
        $u = Event_type::find($id);
        if (is_null($u)) {
            return ['success' => false, 'event type not found'];
        }
        // todo запилить разрешения
        try {
            $u->delete();
        } finally {
            return Response::json(['success' => true]);
        }
        return Response::json(['success' => false, 'error' => 'error']);
    }
}
