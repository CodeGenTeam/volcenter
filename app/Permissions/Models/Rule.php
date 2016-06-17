<?php

namespace App\Permissions\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{

    public $timestamps = false;
    protected $table = 'Permissions';
    protected $fillable = ['rule'];
    protected $visible = ['id', 'rule'];
}
