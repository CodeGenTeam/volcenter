<?php

namespace app\Models;

use Illuminate\Foundation\Auth\User as Auth;

class Users extends Auth
{
    protected $table = 'Users';
    protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at','id'];
    protected $fillable = ['login', 'email', 'password', 'firstname', 'lastname', 'middlename', 'birthday', 'place_of_work'];
    
    public function applications()
    {
        return $this->hasMany(Applications::class, 'user_id');
    }
    public function profiles()
    {
        return $this->hasMany(Profiles::class, 'user_id');
    }
    public function addreses()
    {
        return $this->hasMany(Addreses::class, 'user_id');
    }
    public function language_level()
    {
        return $this->hasMany(Language_level::class, 'user_id');
    }
    public function clothes()
    {
        return $this->hasMany(Clothes::class, 'user_id');
    }
    public function study()
    {
        return $this->hasMany(Study::class, 'user_id', 'id');
    }
    public function place_of_work()
    {
        return $this->hasOne(Places_of_work::class, 'user_id');
    }
    // Permissions
}
