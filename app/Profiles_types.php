<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles_types extends Model {

    protected $fillable = ['name'];
    protected $table = 'profiles_types';
    public $timestamps = false;
}
