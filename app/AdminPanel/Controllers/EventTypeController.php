<?php

namespace app\AdminPanel\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event_type;
use Illuminate\Support\Facades\Response;

class EventTypeController extends Controller
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			switch ($request->query('action')) {
				case 'delete_item':
					Event_type::destroy($request->query('id'));
					return Response::json(['success' => true]);
					break;
				case 'save_item':
					if ($id = $request->query('id')) {
						$event_type = Event_type::findOrFail($id);
						$event_type->update($request->all());
						$message = 'Обновлено';
					} else {
						Event_type::create($request->all());
						$message = 'Сохранено';
					}
					return Response::json(['success' => true, 'message' => $message]);

					break;
				case 'edit_item':
					if ($id = $request->query('id')) {
						$event_type = Event_type::find($request->query('id'));
					} else {
						$event_type = new Event_type();
					}

					return view('admin_panel.event_types.modal', ['event_type' => $event_type]);
					break;
				case 'items_list':
					return view('admin_panel.event_types.list', ['event_types' => Event_type::all()]);
					break;
				default:
					return Response::json(['success' => false, 'error' => 'empty action']);
					break;
			}
		} else {
			return view('admin_panel.event_types.index', ['event_types' => Event_type::all()]);
		}
	}
}
