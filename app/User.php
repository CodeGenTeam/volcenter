<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at'];
    protected $table = 'users';
    protected $fillable = array('login', 'email', 'password');

    public function applications() {
       return $this->hasMany('App\Applications', 'user_id', 'id');
    }
}
