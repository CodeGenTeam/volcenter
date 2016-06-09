<?php

namespace app\AdminPanel\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\Response;

class UsersController extends Controller
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			switch ($request->query('action')) {
				case 'delete_item':
					Users::destroy($request->query('id'));
					return Response::json(['success' => true]);
					break;
				case 'save_item':
					if ($id = $request->query('id')) {
						$user = Users::findOrFail($id);
						$user->update($request->all());
						$message = 'Обновлено';
					} else {
						Users::create($request->all());
						$message = 'Сохранено';
					}
					return Response::json(['success' => true, 'message' => $message]);

					break;
				case 'edit_item':
					if ($id = $request->query('id')) {
						$user = Users::find($request->query('id'));
					} else {
						$user = new Users();
					}

					return view('ap.users.modal', [
						'user' => $user,
					]);
					break;
				case 'items_list':
					return view('ap.users.list', ['users' => Users::all()]);
					break;
				default:
					return Response::json(['success' => false, 'error' => 'empty action']);
					break;
			}
		} else {
			return view('ap.users.index', ['users' => Users::all()]);
		}
	}
}
