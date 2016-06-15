<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['name'];
    protected $hidden = ['id'];
    public $timestamps = false;
    public function getApplications()
    {
        return $this->hasMany(Application::class);
    }
}
