<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    public $timestamps = false;
    public $table = 'Study';
    public $fillable = ['user_id','place_name','time_start','time_end','group'];
    public $hidden = ['id','user_id'];
    public function getUser()
    {
        return $this->belongsToMany(Users::class, 'Study', 'id', 'user_id');
    }
    public function getStudyUniversity()
    {
        return $this->hasMany(Study_university::class, 'study_id', 'id');
    }
}
