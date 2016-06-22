<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level_language extends Model
{
    protected $fillable = [ 'name' ];
    protected $hidden = [ 'id' ];
    public $timestamps = false;
}