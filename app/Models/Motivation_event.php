<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motivation_event extends Model
{
    protected $fillable = ['motivation_id', 'event_id'];
    protected $hidden = ['id'];
    public $timestamps = false;

    public function getMotivation()
    {
        return $this->belongsToMany(Motivation::class);
    }

    public function getEvent()
    {
        return $this->belongsToMany(Event::class);
    }
}
