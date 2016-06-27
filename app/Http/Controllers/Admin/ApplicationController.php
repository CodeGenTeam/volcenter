<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Event;
use App\Models\Responsibility_event;
use App\Models\Responsibility;
use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Models\User;

class ApplicationController extends Controller {

    public function index(Event $event) {
        // ответственности только по определенному мероприятию
        $responsibilities_event =  Responsibility_event::where('event_id', $event->id)->get();
        $responsibility_events_id = Responsibility_event::select('id')->where('event_id', $event->id)->get();
        $responsibility_id = Responsibility_event::select('responsibility_id')->where('event_id', $event->id)->get();
        $responsibilities = Responsibility::whereIn('id', $responsibility_id)->get();
        // выбрали заявки по определенным направлениям, которым = id мероприятия, сгрупировали по пользователю и выбрали последний статус
        $applications = Application::whereIn('responsibility_event_id', $responsibility_events_id)->get()->groupBy('user_id');
        $statuses = Status::all();
        $users = User::all();
        return view('admin_panel.events.applications.index',['applications'=>$applications,'responsibilities'=>$responsibilities,'responsibilities_event'=>$responsibilities_event,'event'=>$event,'statuses'=>$statuses,'users'=>$users]);
    }
    public function create(Request $request,Event $event)
    {
        Application::create($request->all());
        $responsibilities_event =  Responsibility_event::where('event_id', $event->id)->get();
        $responsibility_events_id = Responsibility_event::select('id')->where('event_id', $event->id)->get();
        $responsibility_id = Responsibility_event::select('responsibility_id')->where('event_id', $event->id)->get();
        $responsibilities = Responsibility::whereIn('id', $responsibility_id)->get();
        // выбрали заявки по определенным направлениям, которым = id мероприятия, сгрупировали по пользователю и выбрали последний статус
        $applications = Application::whereIn('responsibility_event_id', $responsibility_events_id)->get()->groupBy('user_id');
        $statuses = Status::all();
        $users = User::all();
        return view('admin_panel.events.applications.list',['applications'=>$applications,'responsibilities'=>$responsibilities,'responsibilities_event'=>$responsibilities_event,'event'=>$event,'statuses'=>$statuses,'users'=>$users]);
    }
}