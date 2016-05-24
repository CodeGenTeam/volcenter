<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language_level extends Model
{
	protected $table = "Language_level";
	protected $fillable = ['user_id','language_id','mark'];
	protected $hidden = ['id','user_id','language_id'];
	public $timestamps = false;
	public function getUser() {
		return $this->belongsToMany(Users::class,'Language_level','id','user_id');
	}
	public function getLanguage() {
		return $this->belongsToMany(Languages::class,'Language_level','id','language_id');
	}
}
