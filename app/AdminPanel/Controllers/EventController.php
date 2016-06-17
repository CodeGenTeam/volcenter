<?php

namespace App\AdminPanel\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use App\Models\Event;
use App\Models\Event_type;
use Illuminate\Support\Facades\Response;
use File;

class EventController extends Controller
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			$img_path = base_path('public').'user_panel_bin/images/events';
			switch ($request->query('action')) {
				case 'delete_item':
					$event = Event::find($request->query('id'));
					//remove old img
					if (!empty($event->image)) {
						File::delete($img_path.'/'.$event->image);
					}

					Event::destroy($request->query('id'));
					return Response::json(['success' => true]);
					break;
				case 'save_item':
					if ($id = $request->query('id')) {
						$event = Event::findOrFail($id);
						$event->update($request->all());
						$message = 'Обновлено';
					} else {
						Event::create($request->all());
						$message = 'Сохранено';
					}
					return Response::json(['success' => true, 'message' => $message]);

					break;
				case 'edit_item':
					if ($id = $request->query('id')) {
						$event = Event::find($request->query('id'));
					} else {
						$event = new Event();
					}

					return view('admin_panel.events.modal', [
						'event' => $event,
						'event_types' => Event_type::all()
					]);
					break;
				case 'save_img':
					/** @var \Illuminate\Http\UploadedFile $file */
					$file = $request->file('file_data');
					$file_name = md5(time().$file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
					$file->move($img_path, $file_name);

					return Response::json([
						'success'   => true, 
						'filename'  => $file_name,
					]);
					break;
				case 'delete_img':
					//remove old img
					if ($old_img = $request->query('old_img')) {
						File::delete($img_path.'/'.$old_img);
					}

					return Response::json(['success' => true]);
					break;
				case 'items_list':
					return view('admin_panel.events.list', ['events' => Event::all()]);
					break;
				default:
					return Response::json(['success' => false, 'error' => 'empty action']);
					break;
			}
		} else {
			return view('admin_panel.events.index', ['events' => Event::all()]);
		}
	}
}
