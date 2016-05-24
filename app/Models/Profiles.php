<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model {
    public $timestamps = false;
    protected $fillable = ['user_id', 'profile_type_id', 'link'];
    protected $table = 'Profiles';
    protected $hidden = ['id', 'user_id', 'profile_type_id'];
    public function getUser() {
        return $this->belongsToMany(Users::class,'Profiles','id','user_id');
    }
    public function getProfileType() {
        return $this->belongsToMany(Profiles_types::class,'Profiles','id','profile_type_id');
    }
}
