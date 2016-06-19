<?php

namespace App\Permissions\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = false;
    protected $fillable = ['rule'];
    protected $visible = ['id', 'rule'];
}
