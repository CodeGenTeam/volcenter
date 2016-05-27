<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Events_type;
use Illuminate\Http\Request;
use Response;

class APIEventTypeController extends Controller {
    
    public function index() {
        return Events_type::all();
    }
    
    public function store (Request $request)
    {
        return Events_type::create($request->all());
    }
    
    public function show($id){
        return Events_type::findOrFail($id);
    }
    
    public function update(Request $request, $id)
    {
        Events_type::findOrFail($id)->update($request->all());
        return Response::json($request->all()); //response()->json()
    }

    public function destroy($id)
    {
        return Events_type::destroy($id);
    }
}