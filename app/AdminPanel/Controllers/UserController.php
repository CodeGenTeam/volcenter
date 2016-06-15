<?php

namespace app\AdminPanel\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			switch ($request->query('action')) {
				case 'delete_item':
					User::destroy($request->query('id'));
					return Response::json(['success' => true]);
					break;
				case 'save_item':
					if ($id = $request->query('id')) {
						$user = User::findOrFail($id);
						$user->update($request->all());
						$message = 'Обновлено';
					} else {
						User::create($request->all());
						$message = 'Сохранено';
					}
					return Response::json(['success' => true, 'message' => $message]);

					break;
				case 'edit_item':
					if ($id = $request->query('id')) {
						$user = User::find($request->query('id'));
					} else {
						$user = new User();
					}
					return view('admin_panel.users.modal', compact('user'));
					break;
				case 'items_list':
					return view('admin_panel.users.list', ['users' => User::all()]);
					break;
				default:
					return Response::json(['success' => false, 'error' => 'empty action']);
					break;
			}
		} else {
			return view('admin_panel.users.index', ['users' => User::all()]);
		}
	}
}
