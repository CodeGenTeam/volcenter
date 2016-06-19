<?php
namespace App\Permissions\Models;

use App\Models\User;
use App\Permissions\RulesSet;
use Illuminate\Database\Eloquent\Model;

class Permission_group extends Model {

    protected $fillable = ['name','descr'];
    protected $appends = ['rules'];

    public function getRulesAttribute() {
        return RulesSet::fromGroup($this->id)->getRules();
    }

    public function rules() {
        return $this->belongsToMany(Permission::class, 'group_permissions', 'group_id', 'permission_id');
    }
    
    public function users() {
        return $this->belongsToMany(User::class, 'user_group_accessories', 'group_id', 'user_id');
    }
}
