<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Models\Motivation_event;
use App\Models\Motivation;
use App\Models\Event;
use DB;
class MotivationEventController extends Controller
{
    public function index(Request $request,Event $event)
    {
        if ($request->ajax()) {
            switch ($request->query('action')) {
                case 'delete_item':
                    Motivation_event::destroy($request->query('id'));
                    return Response::json(['success' => true]);
                    break;
                case 'edit_item':
                    $motivation_events = Motivation_event::select('motivation_id')->where('event_id', $event->id)->get();
                    $motivations = Motivation::whereNotIn('id', $motivation_events->toArray())->get();
                    return view('admin_panel.events.motivations.modal', [
                        'motivations' => $motivations,
                    ]);
                    break;
                case 'save_item':
                    Motivation_event::create(['event_id'=>$event->id,'motivation_id'=>$request->query('motivations')]);
                    $message = 'Сохранено';
                    return Response::json(['success' => true, 'message' => $message]);
                    break;
                case 'items_list':
                    $event->load('getMotivationEvent.getMotivation');
                    return view('admin_panel.events.motivations.list', ['event' => $event]);
                    break;
                default:
                    return Response::json(['success' => false, 'error' => 'empty action']);
                    break;
            }
        }else
        {
            $event->load('getMotivationEvent.getMotivation');
            return view('admin_panel.events.motivations.index',['event'=>$event]);
        }
    }
}
