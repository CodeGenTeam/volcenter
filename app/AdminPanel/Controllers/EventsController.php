<?php

namespace app\AdminPanel\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Events;

class EventsController extends Controller
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			switch ($request->get('action')) {
				case 'check':
					return $this->checkUser($request);
					break;
				case 'register':
					$check = $this->checkUser($request);
					if (!$check['success']) {
						return $check;
					}
					return $this->register($request);
					break;
				default:
					return Response::json(['success' => false, 'error' => 'empty action']);
					break;
			}
		} else {
			return view('ap.events.index', ['events' => Events::all()]);
		}
	}
}
