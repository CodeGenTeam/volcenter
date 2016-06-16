<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Event;

class IndexController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 */
	public function __construct()
	{
		// $this->middleware('auth');
	}

    public function index()
    {
        return view('home');
    	/*$events = Event::all();
    	foreach ($events as $ev) {
    		$ev->load('getEventType');
    	}

    	return view('user_panel.index', ['events' => $events]);*/
    }
}
