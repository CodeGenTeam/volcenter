<?php

namespace App\AdminPanel\Controllers;

use App\Models\Application;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApplicationController extends Controller {

    public function index(Event $event) {
        return view('admin_panel.events.applications');
    }
}