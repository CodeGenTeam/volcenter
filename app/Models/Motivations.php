<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Motivations extends Model
{
    public $timestamps = false;
    protected $table = 'Motivations';
    protected $hidden = ['id'];
    protected $fillable = ['name','descr'];
    public function getMotivationsEvents()
    {
        return $this->hasMany(Motivations_events::class, 'motivation_id', 'id');
    }
}
