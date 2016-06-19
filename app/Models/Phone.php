<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['user_id', 'phone'];
    protected $hidden = ['id','user_id'];
    public $timestamps = false;

    public function getUser()
    {
        return $this->belongsTo(User::class);
    }
}
