<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Responsibility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ResponsibilityController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            switch ($request->query('action')) {
                case 'delete_item':
                    Responsibility::destroy($request->query('id'));
                    return Response::json(['success' => true]);
                    break;
                case 'save_item':
                    if ($id = $request->query('id')) {
                        $responsibility = Responsibility::findOrFail($id);
                        $responsibility->update($request->all());
                        $message = 'Обновлено';
                    } else {
                        Responsibility::create($request->all());
                        $message = 'Сохранено';
                    }
                    return Response::json(['success' => true, 'message' => $message]);

                    break;
                case 'edit_item':
                    if ($id = $request->query('id')) {
                        $responsibility = Responsibility::find($request->query('id'));
                    } else {
                        $responsibility = new Responsibility();
                    }

                    return view('admin_panel.responsibilities.modal', [
                        'responsibility' => $responsibility,
                    ]);
                    break;
                case 'items_list':
                    return view('admin_panel.responsibilities.list', ['responsibilities' => Responsibility::all()]);
                    break;
                default:
                    return Response::json(['success' => false, 'error' => 'empty action']);
                    break;
            }
        } else {
            return view('admin_panel.responsibilities.index', ['responsibilities' => Responsibility::all()]);
        }
    }
}