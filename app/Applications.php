<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model {

    protected $fillable = ['user_id', 'event_id', 'status_id'];
    protected $hidden = ['id'];
    public $timestamps = false;
}
