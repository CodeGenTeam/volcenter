<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events_type extends Model
{
    protected $table = "Events_type";
    protected $fillable = ['name'];
    public $timestamps = false;

    function events() {
        return $this->hasMany(Events::class, 'event_type', 'id');
    }
}
