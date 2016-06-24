<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model {

    public $timestamps = false;
    protected $fillable = ['user_id', 'responsibility_event_id', 'status_id'];

    public function getEvent() {
        return $this->hasMany(Event::class,'id');
    }

    public function getStatus() {
        return $this->hasMany(Status::class,'status_id');
    }
}
