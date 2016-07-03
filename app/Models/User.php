<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Auth;

class User extends Auth {

    public $timestamps = false;
    protected $hidden = ['password','role_id'];
    protected $fillable = ['username', 'email', 'password', 'firstname', 'lastname', 'middlename', 'birthday','role_id','image'];
    protected $dates = ['birthday'];
    
    public function role()
    {
        return $this->belongsTo(Role::class)->first()->name;
    }

    public function profiles() {
        return $this->hasMany(Profile::class,'user_id');
    }
    

    public function phones()
    {
        return $this->hasMany(Phone::class,'user_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class,'user_id');
    }

    public function study() {
        return $this->hasMany(Study::class,'user_id');
    }
    
    public function language() {
        return $this->hasMany(Language_level::class);
    }
    
    // dry

    public function applications() {
        return $this->hasMany(Application::class);
    }
}
