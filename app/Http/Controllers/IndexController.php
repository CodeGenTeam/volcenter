<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Event;

class IndexController extends Controller
{
    public function index()
    {
    	$events = Event::all();
    	foreach ($events as $ev) {
    		$ev->load('getEventType');
    	}

    	return view('user_panel.index', ['events' => $events]);
    }
}
