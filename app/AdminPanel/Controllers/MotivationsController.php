<?php

namespace app\AdminPanel\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use app\Models\Motivations;

class MotivationsController extends Controller
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			switch ($request->query('action')) {
				case 'delete_item':
					Motivations::destroy($request->query('id'));
					return Response::json(['success' => true]);
					break;
				case 'save_item':
					if ($id = $request->query('id')) {
						$motivation = Motivations::findOrFail($id);
						$motivation->update($request->all());
						$message = 'Обновлено';
					} else {
						Motivations::create($request->all());
						$message = 'Сохранено';
					}
					return Response::json(['success' => true, 'message' => $message]);

					break;
				case 'edit_item':
					if ($id = $request->query('id')) {
						$motivation = Motivations::find($request->query('id'));
					} else {
						$motivation = new Motivations();
					}

					return view('ap.motivations.modal', [
						'motivation' => $motivation,
					]);
					break;
				case 'items_list':
					return view('ap.motivations.list', ['motivations' => Motivations::all()]);
					break;
				default:
					return Response::json(['success' => false, 'error' => 'empty action']);
					break;
			}
		} else {
			return view('ap.motivations.index', ['motivations' => Motivations::all()]);
		}
	}
}
