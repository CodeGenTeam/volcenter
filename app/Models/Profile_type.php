<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Profile_type extends Model
{
    protected $hidden = ['id'];
    protected $fillable = ['name'];
    public $timestamps = false;
    public function getProfiles()
    {
        return $this->hasMany(Profile::class);
    }
}
