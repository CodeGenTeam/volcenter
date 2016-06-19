<?php
namespace App\Permissions\Models;

use Illuminate\Database\Eloquent\Model;

class Group_permission extends Model
{
    protected $fillable = ['group_id', 'permission_id'];

    public function rule()
    {
        return $this->hasOne(Permission::class, 'id', 'permissions_id');
    }
}
