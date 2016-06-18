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
		// только не зарегистрированных пропускает
		//$this->middleware('guest');
	}

    public function index()
    {
    	$number = 3;
        $events = Event::take($number)->orderBy('id', 'desc')->get();
        foreach ($events as $event) {
        	$event->load('getEventType');
        }
        return view('home', ['events' => $events]);
    }
}
