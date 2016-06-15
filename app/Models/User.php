<?php

namespace app\Models;

use Illuminate\Foundation\Auth\User as Auth;

class User extends Auth
{
    protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at','id'];
    protected $fillable = ['login', 'email', 'password', 'firstname', 'lastname', 'middlename', 'birthday', 'place_of_work'];
    
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
    public function addreses()
    {
        return $this->hasMany(Address::class);
    }
    public function language_level()
    {
        return $this->hasMany(Language_level::class);
    }
    public function clothes()
    {
        return $this->hasMany(Clothes::class);
    }
    public function study()
    {
        return $this->hasMany(Study::class);
    }
    public function place_of_work()
    {
        return $this->hasOne(Place_of_work::class);
    }
    // Permissions
}
