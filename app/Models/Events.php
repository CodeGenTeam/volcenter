<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    public $timestamps = false;
    protected $table = "Events";
    protected $fillable = ['id', 'event_start', 'event_end', 'name', 'descr', 'address','event_type'];
    public function getEventType()
    {
        return $this->belongsToMany(Events_type::class, 'Events', 'id', 'event_type');
    }
}
