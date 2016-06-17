<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsibility_event extends Model
{
    protected $fillable = ['event_id','responsibility_id'];
    protected $hidden = ['id','event_id','responsibility_id'];
    public $timestamps = false;
    public function getResponsibility()
    {
        return $this->belongsToMany(Responsibility::class);
    }
    public function getEvent()
    {
        return $this->belongsToMany(Event::class);
    }/*
    public function getRespEvent()
    {
        return $this->hasManyThrough(Responsibility_event::class,Event::class);
    }*/
}
