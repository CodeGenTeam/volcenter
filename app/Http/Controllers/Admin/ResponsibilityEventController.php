<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Models\Responsibility_event;
use App\Models\Responsibility;
use App\Models\Event;
use DB;

class ResponsibilityEventController extends Controller
{
    public function index(Request $request,Event $event)
    {
        if ($request->ajax()) {
            switch ($request->query('action')) {
                case 'delete_item':
                    Responsibility_event::destroy($request->query('id'));
                    return Response::json(['success' => true]);
                    break;
                case 'edit_item':
                    $responsibility_events = Responsibility_event::select('responsibility_id')->where('event_id', $event->id)->get();
                    $responsibility = Responsibility::whereNotIn('id', $responsibility_events)->get();
                    return view('admin_panel.events.responsibilities.modal', [
                        'responsibilities' => $responsibility,
                    ]);
                    break;
                case 'save_item':
                    Responsibility_event::create(['event_id'=>$event->id,'responsibility_id'=>$request->query('responsibilities')]);
                    $message = 'Сохранено';
                    return Response::json(['success' => true, 'message' => $message]);
                    break;
                case 'items_list':
                    $event->load('getResponsibilityEvent.getResponsibility');
                    return view('admin_panel.events.responsibilities.list', ['event' => $event]);
                    break;
                default:
                    return Response::json(['success' => false, 'error' => 'empty action']);
                    break;
            }
        }else
        {
            $event->load('getResponsibilityEvent.getResponsibility');
            return view('admin_panel.events.responsibilities.index',['event'=>$event]);
        }
    }
}
