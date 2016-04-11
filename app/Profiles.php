<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model {

    public $timestamps = false;
    protected $fillable = ['user_id', 'profile_type_id', 'link'];
    protected $table = 'profiles';
    protected $hidden = ['id', 'user_id', 'profile_type_id'];
    protected $appends = ['type'];

    public function getTypeAttribute() {
        return $this->type()->firstOrFail()->name;
    }

    public function type() {
        return $this->hasOne('App\Profiles_types', 'id', 'profile_type_id');
    }
}
