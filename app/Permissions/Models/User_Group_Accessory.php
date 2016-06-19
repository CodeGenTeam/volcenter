<?php
namespace App\Permissions\Models;

use Illuminate\Database\Eloquent\Model;

class User_group_accessory extends Model {
    public $timestamps = false;
    protected $hidden = ['created_by'];
    protected $fillable = ['user_id', 'group_id', 'created_by'];
}
