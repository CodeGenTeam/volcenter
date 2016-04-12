<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

    protected $fillable = ['name', 'descr', 'event_type', 'event_start', 'event_end', 'address'];
    protected $table = "events";
    protected $hidden = [
        'event_start', 'event_end', 'event_type'
    ];
    protected $appends = ['type'];

    public function getTypeAttribute() {
        return $this->type()->firstOrFail()->name;
    }

    public function type() {
        return $this->hasOne('App\Event_type', 'id', 'event_type');
    }
}
