<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

    public $timestamps = false;

    protected $table = "events";
    protected $hidden = [
        'event_type'
    ];
    protected $fillable = 
        [
            'event_start',
            'event_end',
            'name',
            'descr',
            'address',
            'event_type'
        ];
    protected $appends = ['type'];

    public function getTypeAttribute() {
        return $this->type()->firstOrFail()->name;
    }

    public function type() {
        return $this->hasOne('App\Event_type', 'id', 'event_type');
    }
}
