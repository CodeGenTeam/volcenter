<?php
namespace app\Permissions\Models;


use Illuminate\Database\Eloquent\Model;

class Group extends Model {

    protected $table = 'PermissionGroups';
    protected $hidden = ['created_at', 'updated_at', 'created_by'];
    protected $fillable = ['name', 'created_by'];
    protected $appends = ['rules'];

    public function getRuleAttribute() {
        return $this->rules()->get()->all();
    }

    public function rules() {
        return $this->belongsToMany('App\Permissions\Models\Rule', 'GroupPermissions', 'group_id', 'permission_id');
    }
}