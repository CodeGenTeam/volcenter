<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event_type extends Model
{
    protected $table = "events_types";
    protected $fillable = ['name'];
    public $timestamps = false;

    function events() {
        return $this->hasMany(Event::class, 'event_type', 'id');
    }
}