<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Language_level extends Model
{
    protected $fillable = ['user_id','language_id','mark'];
    protected $hidden = ['id','user_id','language_id'];
    public $timestamps = false;
    public function getUser()
    {
        return $this->belongsToMany(User::class);
    }
    public function getLanguage()
    {
        return $this->belongsToMany(Language::class);
    }
}
