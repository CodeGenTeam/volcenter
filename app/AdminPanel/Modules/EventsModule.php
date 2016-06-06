<?php

namespace app\AdminPanel\Modules;

use app\AdminPanel\Module;
use app\Models\Events;

class EventsModule extends Module {

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