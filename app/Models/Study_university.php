<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Study_university extends Model
{
    public $timestamps = false;
    public $fillable = ['study_id','faculty','chair'];
    public $hidden = ['id','study_id'];
    public function getStudy()
    {
        return $this->belongsToMany(Study::class);
    }
}
