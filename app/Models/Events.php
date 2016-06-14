<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    public $timestamps = false;
    protected $table = "Events";
    protected $fillable = ['id', 'event_start', 'event_end', 'name', 'image', 'descr', 'address','event_type'];
    public function getEventType()
    {
        return $this->belongsTo(Events_type::class, 'id');
    }
}
