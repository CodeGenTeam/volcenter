<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;
    public function getApplications()
    {
        return $this->hasMany(Application::class);
    }
}
