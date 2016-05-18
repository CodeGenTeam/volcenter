<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at'];
    protected $table = 'users';
    protected $fillable = array('login', 'email', 'password', 'name1', 'name2', 'name3');

    public function applications() {
       return $this->hasMany(Applications::class, 'user_id', 'id');
    }

    public function profiles() {
        return $this->hasMany(Profiles::class, 'user_id', 'id');
    }
}
