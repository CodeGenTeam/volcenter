<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events_type extends Model {
    protected $table = "Events_type";
    protected $hidden = ['id'];
    protected $fillable = ['name'];
    public $timestamps = false;
    public function getEvents() {
        return $this->hasMany(Events::class, 'event_type', 'id');
    }
}
