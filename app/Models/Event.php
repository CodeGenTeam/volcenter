<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'event_start', 'event_stop', 'name', 'image', 'descr', 'address','event_type'];

    public function getEventType()
    {
        return $this->belongsTo(Event_type::class, 'event_type');
    }

    public function getMotivation()
    {
        return $this->belongsToMany(Motivation::class, 'motivation_events');
    }

    public function getRespon()
    {
        return $this->hasMany(Responsibility_event::class,'event_id');
    }
}
