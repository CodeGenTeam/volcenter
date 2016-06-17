<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $timestamps = false;
    protected $fillable = ['user_id', 'profile_type_id', 'link'];
    protected $hidden = ['id', 'user_id', 'profile_type_id'];
    public function getUser()
    {
        return $this->belongsToMany(User::class);
    }
    public function getProfileType()
    {
        return $this->belongsToMany(Profile_type::class);
    }
}
