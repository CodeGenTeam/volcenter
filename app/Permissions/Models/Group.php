<?php
namespace App\Permissions\Models;

use App\Permissions\RulesSet;
use Illuminate\Database\Eloquent\Model;

class Group extends Model {

    protected $table = 'PermissionGroups';
    protected $hidden = ['created_at', 'updated_at', 'created_by'];
    protected $fillable = ['name', 'created_by'];
    protected $appends = ['rules'];

    public function getRulesAttribute() {
        return RulesSet::fromGroup($this->id)->getRules();
    }

    public function rules() {
        return $this->belongsToMany(Rule::class, 'GroupPermissions', 'group_id', 'permission_id');
    }
}