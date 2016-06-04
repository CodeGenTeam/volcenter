<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Addreses extends Model
{
    public $timestamps = false;
    protected $table = 'Addreses';
    protected $hidden = ['id', 'user_id'];
    protected $fillable = ['user_id','country','city','street','house','ext','flat'];
    // Pivot_table: get user with user_id
    public function getUser()
    {
        return $this->belongsToMany(Users::class, 'Addreses', 'id', 'user_id');
    }
}
