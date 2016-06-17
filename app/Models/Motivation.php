<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motivation extends Model
{
    public $timestamps = false;
    protected $hidden = ['id'];
    protected $fillable = ['name', 'descr'];

    public function getMotivationsEvents()
    {
        return $this->hasMany(Event::class, 'motivation_event');
    }
}
