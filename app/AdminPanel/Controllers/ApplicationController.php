<?php

namespace App\AdminPanel\Controllers;

use App\Models\Application;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApplicationController extends Controller {

    public function index(Event $event) {
        return view('admin_panel.events.applications', [
            'event' => $event,
            'applications' => Application::where([
                'event_id' => $event->id,
                'status_id' => 1, // на одобрении
            ])->get(),
        ]);
    }

    public function approve(Request $req) {
        $application = Application::find($req->all()['application']);
        if (!$application) abort(400); // чё за фигню ты мне подсунул?
        $application->status_id = 4;
        $application->save();
    }
}