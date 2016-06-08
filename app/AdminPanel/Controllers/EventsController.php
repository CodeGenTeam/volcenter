<?php

namespace app\AdminPanel\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Events_type;
use Illuminate\Support\Facades\Response;

class EventsController extends Controller
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			switch ($request->query('action')) {
				case 'delete_item':
					Events::destroy($request->query('id'));
					return Response::json(['success' => true]);
					break;
				case 'save_item':
					if ($id = $request->query('id')) {
						$event = Events::findOrFail($id);
						$event->update($request->all());
						$message = 'Обновлено';
					} else {
						Events::create($request->all());
						$message = 'Сохранено';
					}
					return Response::json(['success' => true, 'message' => $message]);

					break;
				case 'edit_item':
					if ($id = $request->query('id')) {
						$event = Events::find($request->query('id'));
					} else {
						$event = new Events();
					}

					return view('ap.events.modal', [
						'event' => $event,
						'events_type' => Events_type::all()
					]);
					break;
				case 'items_list':
					return view('ap.events.list', ['events' => Events::all()]);
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
