<?php
namespace app\Permissions\Models;


use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model {

    protected $table = 'UserPermissions';
    protected $fillable = ['user_id', 'permission_id', 'created_by'];
    protected $hidden = ['user_id', 'permission_id', 'created_by'];
    protected $appends = ['createdBy', 'rules', 'user'];

    public function getCreateByAttribute() {
        return $this->createdBy()->firstOrCreate([
            'id' => -1, 'login' => 'admin', 'email' => 'admin@mail.volcenter.ru'
        ]);
    }

    public function createdBy() {
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function getRulesAttribute() {
        return $this->rule()->firstOrCreate(['id' => -1, 'rule' => 'err']);
    }

    public function rule() {
        return $this->hasOne('App\Permissions\Models\Rule', 'id', 'permission_id');
    }

    public function getUserAttribute() {
        return $this->user()->firstOrFail();
    }

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}