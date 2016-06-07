<?php

namespace app\AdminPanel\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Events;

class EventsController extends Controller
{
	public function index()
	{
		return view('ap.events.index', ['events' => Events::all()]);
	}
}
