<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;

class ResponsibilityController extends Controller
{
    public function index(Event $event)
    {
        $event->load('getRespon.getResponsibility');
        return view('admin_panel.events.responsibilities',['event'=>$event]);
    }
}