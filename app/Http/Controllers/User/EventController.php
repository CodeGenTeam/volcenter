<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Application;
use App\Models\Event;
use App\Models\Responsibility_event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class EventController extends Controller
{

    private $upgradeableUserFields = ['name', 'descr', 'address', 'event_start', 'event_end', 'event_type'];
    private $page = '\bin\img\users';

    public function index()
    {
        return Response::json(Event::all());
    }

    public function getList($id)
    {
        $number = 3;
        return Response::json(Event::take($number)->skip((intval($id) - 1) * $number)->get()->load('getEventType'));
    }

    public function getlast()
    {
        $number = 3;
        return Response::json(Event::take($number)->get()->load('getMotivation'));
    }

    public function delete(Event $event)
    {
        if (is_null($event)) {
            return ['success' => false, 'error' => 'event not found'];
        }
        $event->delete();
        return ['success' => true];
    }

    public function create(Request $request)
    {
        $data = $request->all();
        Event::create([
            'name' => $data['name'],
            'descr' => $data['descr'],
            'address' => $data['address'],
            'event_type' => $data['event_type'],
            'event_start' => $data['event_start'],
            'event_end' => $data['event_end'],
        ]);
        return Response::json(['success' => true]);
    }

    public function update(Request $request, Event $id)
    {
        if (is_null($id)) {
            return ['success' => false, 'event not found'];
        } else {
            // todo запилить разрешения
            $updated = [];
            foreach ($request as $key => $value) {
                if (in_array($key, $this->upgradeableUserFields)) {
                    try {
                        $id->{$key} = $value;
                        $id->save();
                    } finally {
                        $updated[] = $key;
                    }
                }
            }
            return ['success' => count($updated) != 0, 'fields' => $updated];
        }
    }

    public function show(Event $event)
    {
        if (is_null($event)) {
            return ['success' => false, 'error' => 'event not found'];
        } else {
            if(\Auth::check()) {
                // ответственности только по определенному мероприятию
                $responsibility_events_id = Responsibility_event::select('id')->where('event_id', $event->id)->get();
                // выбрали заявки по определенным направлениям, которым = id мероприятия, сгрупировали по пользователю и выбрали последний статус
                $applications = Application::whereIn('responsibility_event_id', $responsibility_events_id)->get()->where('user_id', Auth::user()->id)->last();
                //$responsibility_last =
                //  dd(Application::whereIn('responsibility_event_id', $responsibility_events_id)->groupBy('user_id','responsibility_event_id')->get());
               // $count = $applications = Application::whereIn('id', $responsibility_last)->whereIn('status_id',[3,5,6])->get()->count();
                //->whereIn('status_id',[3,5,6])
            }else $applications=null;
            $event->load('getEventType')->load('getResponsibility')->load('getMotivation')->load('getResponsibilityEvent.getResponsibility');
            return view('events.single', ['event' => $event,'applications'=>$applications]);
        }
    }

    public function all(Request $req)
    {
        $date = Carbon::parse($req->all()['date'] ?? 'now');
        $events = Event::where('event_stop', '>=', $date)->orderBy('event_start', 'desc')->get();
        return view('events.list', ['events' => $events, 'date' => $date]);
    }
}