<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    public $timestamps = false;
    protected $table = 'Applications';
    protected $fillable = ['user_id', 'event_id', 'status_id'];
    protected $hidden = ['id', 'user_id', 'event_id', 'status_id'];
    public function getUser()
    {
        return $this->belongsToMany(Users::class, 'Applications', 'id', 'user_id');
    }
    public function getEvent()
    {
        return $this->belongsToMany(Events::class, 'Applications', 'id', 'user_id');
    }
    public function getStatus()
    {
        return $this->belongsToMany(Statuses::class, 'Applications', 'id', 'user_id');
    }
}
