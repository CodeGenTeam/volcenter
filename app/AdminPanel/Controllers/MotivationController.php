<?php

namespace app\AdminPanel\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Models\Motivation;

class MotivationController extends Controller
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			switch ($request->query('action')) {
				case 'delete_item':
					Motivation::destroy($request->query('id'));
					return Response::json(['success' => true]);
					break;
				case 'save_item':
					if ($id = $request->query('id')) {
						$motivation = Motivation::findOrFail($id);
						$motivation->update($request->all());
						$message = 'Обновлено';
					} else {
						Motivation::create($request->all());
						$message = 'Сохранено';
					}
					return Response::json(['success' => true, 'message' => $message]);

					break;
				case 'edit_item':
					if ($id = $request->query('id')) {
						$motivation = Motivation::find($request->query('id'));
					} else {
						$motivation = new Motivation();
					}

					return view('ap.motivations.modal', [
						'motivation' => $motivation,
					]);
					break;
				case 'items_list':
					return view('ap.motivations.list', ['motivations' => Motivation::all()]);
					break;
				default:
					return Response::json(['success' => false, 'error' => 'empty action']);
					break;
			}
		} else {
			return view('ap.motivations.index', ['motivations' => Motivation::all()]);
		}
	}
}
