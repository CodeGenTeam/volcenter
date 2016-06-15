<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event_types;
use Illuminate\Http\Request;
use Response;

class APIEventTypeController extends Controller {
    
    public function index(Request $request) {
        if ($request->ajax())
        {
            return Event_types::all();
        }
        return abort(404);
    }
    
    public function store (Request $request)
    {
        if ($request->ajax())
        {
            return Event_types::create($request->all());
        }
        return abort(404);
    }
    
    public function show(Request $request, $id){
        if ($request->ajax())
        {
            return Event_types::findOrFail($id);
        }
        return abort(404);
    }
    
    public function update(Request $request, $id)
    {
        if ($request->ajax())
        {
            Event_types::findOrFail($id)->update($request->all());
            return Response::json($request->all()); //response()->json()
        }
        return abort(404);
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax())
        {
            return Event_types::destroy($id);
        }
        return abort(404);
    }
}