<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'event_start', 'event_end', 'name', 'image', 'descr', 'address','event_type','event_start_register_user','event_stop_register_user'];
    public function getEventType()
    {
        return $this->belongsTo(Event_type::class,'id');
    }
    public function getMotivation()
    {
        return $this->hasMany(Motivation_event::class);
    }
    public function getResponsibility()
    {
        return $this->hasMany(Responsibility_event::class);
    }
}
