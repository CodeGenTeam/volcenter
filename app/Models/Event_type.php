<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Event_type extends Model
{
    //protected $hidden = ['id'];
    protected $fillable = ['name'];
    public $timestamps = false;
    
    public function getEvents()
    {
        return $this->hasMany(Event::class);
    }
}
