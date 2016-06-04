<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Events_type;
use Illuminate\Http\Request;
use Response;

class APIEventTypeController extends Controller {
    
    public function index(Request $request) {
        if ($request->ajax())
        {
            return Events_type::all();
        }
        return abort(404);
    }
    
    public function store (Request $request)
    {
        if ($request->ajax())
        {
            return Events_type::create($request->all());
        }
        return abort(404);
    }
    
    public function show(Request $request, $id){
        if ($request->ajax())
        {
            return Events_type::findOrFail($id);
        }
        return abort(404);
    }
    
    public function update(Request $request, $id)
    {
        if ($request->ajax())
        {
            Events_type::findOrFail($id)->update($request->all());
            return Response::json($request->all()); //response()->json()
        }
        return abort(404);
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax())
        {
            return Events_type::destroy($id);
        }
        return abort(404);
    }
}