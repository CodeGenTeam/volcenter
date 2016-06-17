<?php
namespace App\Permissions\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroupAccessory extends Model
{

    protected $table = 'UserGroupAccessory';
    protected $hidden = ['created_at', 'update_at', 'created_by'];
    protected $fillable = ['user_id', 'group_id', 'created_by'];
}
