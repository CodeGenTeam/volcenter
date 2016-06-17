<?php

namespace App\AdminPanel\Widgets;

use app\AdminPanel\Widget;
use app\Models\Event;

class EventWidget extends Widget {

    public function __construct() {
        parent::__construct('event', 'adminpanel.event');
    }

    public function getView() {
        return view('ap.event', ['event' => Event::all()]);
    }

    public function getDisplayName() {
        return 'Мероприятия';
    }
}