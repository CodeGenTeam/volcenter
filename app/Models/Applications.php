<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model {

    public $timestamps = false;
    protected $fillable = ['user_id', 'event_id', 'status_id'];
    protected $hidden = ['id', 'status_id'];
    protected $appends = ['status'];

    public function getStatusAttribute() {
        return $this->status()->firstOrFail()->name;
    }

    public function status() {
        return $this->hasOne('App\Statuses', 'id', 'status_id');
    }
}
