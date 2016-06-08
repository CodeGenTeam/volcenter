<?php

namespace app\AdminPanel\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Events_type;
use Illuminate\Support\Facades\Response;

class EventsTypeController extends Controller
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			switch ($request->query('action')) {
				case 'delete_item':
					Events_type::destroy($request->query('id'));
					return Response::json(['success' => true]);
					break;
				case 'save_item':
					if ($id = $request->query('id')) {
						$event_type = Events_type::findOrFail($id);
						$event_type->update($request->all());
						$message = 'Обновлено';
					} else {
						Events_type::create($request->all());
						$message = 'Сохранено';
					}
					return Response::json(['success' => true, 'message' => $message]);

					break;
				case 'edit_item':
					if ($id = $request->query('id')) {
						$event_type = Events_type::find($request->query('id'));
					} else {
						$event_type = new Events_type();
					}

					return view('ap.events_type.modal', ['event_type' => $event_type]);
					break;
				case 'items_list':
					return view('ap.events_type.list', ['events_type' => Events_type::all()]);
					break;
				default:
					return Response::json(['success' => false, 'error' => 'empty action']);
					break;
			}
		} else {
			return view('ap.events_type.index', ['events_type' => Events_type::all()]);
		}
	}
}
