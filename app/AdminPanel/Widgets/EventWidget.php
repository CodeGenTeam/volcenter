<?php

namespace App\AdminPanel\Widgets;

use App\AdminPanel\Widget;
use App\Models\Event;

class EventWidget extends Widget {

    public function __construct() {
        parent::__construct('events', 'adminpanel.events');
    }

    public function getView() {
        return view('admin_panel.events.index', ['events' => Event::all()]);
    }

    public function getDisplayName() {
        return 'Мероприятия';
    }
}