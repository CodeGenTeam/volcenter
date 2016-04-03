<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\Response;

class EventController extends Controller
{
    public function index()
    {
        $resp = '';

        $events = Event::all();
        foreach ($events as $event) $resp .= $event->name . " = " . $event->event_type->name . ";\t\r\n";

        return $resp;
    }

    public function page($page)
    {
        return $page;
    }
}
