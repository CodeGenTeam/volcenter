<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model {

    public $timestamps = false;
    protected $fillable = ['user_id', 'responsibility_event_id', 'status_id'];
    protected $dates = ['datetime'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $dt = new \Carbon\Carbon();
            $model->datetime = $dt->now()->format('Y-m-d H:i:s');
            return true;
        });
        static::updating(function($model) {
            $dt = new \Carbon\Carbon();
            $model->datetime = $dt->now()->format('Y-m-d H:i:s');
            return true;
        });
    }

    public function getResponsibilityEvent() {
        return $this->hasMany(Responsibility_event::class,'id','responsibility_event_id');
    }
    
    public function getUser()
    {
        return $this->hasMany(User::class,'id','user_id');
    }

    public function getStatus() {
        return $this->hasMany(Status::class,'status_id');
    }
}
