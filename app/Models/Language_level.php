<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language_level extends Model
{
    protected $fillable = ['user_id','language_id','level_language_id'];
    public $timestamps = false;
    public function getUser()
    {
        return $this->belongsToMany(User::class);
    }
    public function getLanguage()
    {
        return $this->hasOne(Language::class,'id');
    }
    public function getLevel()
    {
        return $this->hasOne(Level_language::class,'id');
    }
}
