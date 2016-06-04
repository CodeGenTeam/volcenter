<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Profiles_types extends Model
{
    protected $table = "Profiles_types";
    protected $hidden = ['id'];
    protected $fillable = ['name'];
    public $timestamps = false;
    public function getProfiles()
    {
        return $this->hasMany(Profiles::class, 'profile_type_id', 'id');
    }
}
