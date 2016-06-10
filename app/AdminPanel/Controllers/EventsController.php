<?php

namespace app\AdminPanel\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
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
				case 'save_img':
					/** @var \Illuminate\Http\UploadedFile $file */
					$file = $request->file('file_data');
					$file_name = md5(time().$file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
					$file->move(base_path('public').'/images/events', $file_name);

					return Response::json([
						'success'   => true, 
						'filename'  => $file_name,
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
