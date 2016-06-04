<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Responsibilities extends Model
{
    protected $table = "Responsibilities";
    protected $fillable = ['position','task','count'];
    protected $hidden = ['id'];
    public $timestamps = false;
    public function getResponsibilitiesEvents()
    {
        return $this->hasMany(Responsibilities_events::class, 'responsibility_id', 'id');
    }
}
