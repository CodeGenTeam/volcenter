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
        return $this->belongsTo(User::class);
    }
    public function getProfileType()
    {
        return $this->hasOne(Profile_type::class,'id','profile_type_id');
    }
}
