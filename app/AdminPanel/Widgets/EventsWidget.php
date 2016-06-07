<?php

namespace app\AdminPanel\Widgets;

use app\AdminPanel\Widget;
use app\Models\Events;

class EventsWidget extends Widget {

    public function __construct() {
        parent::__construct('events', 'adminpanel.events');
    }

    public function getView() {
        return view('ap.events', ['events' => Events::all()]);
    }

    public function getDisplayName() {
        return 'Мероприятия';
    }
}