<?php

namespace App\Http\Controllers\Admin;

use App\Models\Application;
use App\Models\Event;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller {

    public function index() {
        $application = Application::all()->where('status_id', 1);
        $application->load('getEvent');
        return view('admin_panel.events.applications',['application'=>$application]);
    }
    public function show(Event $event) {
        return view('admin_panel.events.applications');
    }
}