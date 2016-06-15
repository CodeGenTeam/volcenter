<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $timestamps = false;
    protected $fillable = ['user_id', 'event_id', 'status_id'];
    protected $hidden = ['id', 'user_id', 'event_id', 'status_id'];
    public function getUser()
    {
        return $this->belongsToMany(User::class);
    }
    public function getEvent()
    {
        return $this->belongsToMany(Event::class);
    }
    public function getStatus()
    {
        return $this->belongsToMany(Status::class);
    }
}
