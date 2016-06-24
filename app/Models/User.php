<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Auth;

class User extends Auth {

    public $timestamps = false;
    protected $hidden = ['password', 'id','role_id'];
    protected $fillable = ['login', 'email', 'password', 'firstname', 'lastname', 'middlename', 'birthday','role_id','image'];
    protected $dates = ['birthday'];
    
    public function role()
    {
        return $this->belongsTo(Role::class)->first()->name;
    }
    
    public function phones()
    {
        return $this->hasMany(\App\Models\Phone::class);
    }
    // dry

    public function applications() {
        return $this->hasMany(Application::class);
    }
//, 'profiles.getProfileType'
    public function profiles() {
        return $this->hasMany(Profile::class,'user_id');
    }
    
    public function language() {
        return $this->hasMany(Language_level::class,'user_id');
    }

    public function study() {
        return $this->hasMany(Study::class);
    }
}
