<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statuses extends Model {

    protected $table = "Statuses";
    protected $fillable = ['name'];
    protected $hidden = ['id'];
    public $timestamps = false;
    public function getApplications() {
        return $this->hasMany(Applications::class, 'status_id', 'id');
    }
}
