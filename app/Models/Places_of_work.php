<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Places_of_work extends Model
{
	protected $table = 'Places_of_work';
	public $timestamps = false;
	protected $hidden = ['id'];
	protected $fillable = ['user_id', 'address'];
    public function user()
    {
    	$this->belongsTo(Users::class);
    }
}
