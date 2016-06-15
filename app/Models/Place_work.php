<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Place_work extends Model
{
	public $timestamps = false;
	protected $hidden = ['id'];
	protected $fillable = ['user_id', 'address'];
    public function user()
    {
    	$this->belongsTo(User::class);
    }
}
