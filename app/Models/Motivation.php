<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motivation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function getMotivationsEvents()
    {
        return $this->hasMany(Event::class, 'motivation_event');
    }
}
