<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_type extends Model
{
    protected $table = "events_types";

    function events() {
        return $this->hasMany('App\Event', 'event_type', 'id');
    }
}
