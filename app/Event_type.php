<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_type extends Model
{
    protected $table = "events_types";
    protected $fillable = ['id', 'name'];
}
