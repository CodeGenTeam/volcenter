<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    protected $hidden = ['id'];
    protected $fillable = ['name'];
    public function getUsers()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}