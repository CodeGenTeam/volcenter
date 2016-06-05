<?php

namespace app\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Html\HtmlServiceProviderp;

use App\Http\Controllers\Controller;
use App\Models\Events;

class EventController extends Controller
{
    public function index()
    {
        $events = Events::all();
        return view('admin/events/index', ['events' => $events]);
    }
    public function create()
    {
        return view('admin/events/create');
    }

    public function store()
    {
        // Event post new
    }

    public function show($id)
    {
        $event = Events::find($id);
        return view('admin/events/show')->with('event', $event);
    }

    public function edit($id)
    {
        $event = Events::find($id);
        return view('admin/events/edit')->with('event', $event);
    }

    public function update($id)
    {
    	// Event post update
    }

    public function destroy($id)
    {
    	Events::destroy($id);
    	return 'Они убили Кенни';
        // Kill him
    }
}
