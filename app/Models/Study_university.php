<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Study;

class Study_university extends Model
{
    public $timestamps = false;
    public $fillable = ['study_id','faculty','chair'];
    public $hidden = ['id','study_id'];
    
    public function university()
    {
        return $this->hasMany(Study::class,'id');
    }
}
