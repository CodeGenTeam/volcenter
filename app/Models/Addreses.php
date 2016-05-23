<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addreses extends Model
{
	public $timestamps = false;
	protected $table = 'Addreses';
	protected $hidden = ['id', 'user_id'];
	protected $fillable = ['user_id','country','city','street','house','ext','flat'];
}
