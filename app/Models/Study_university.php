<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Study_university extends Model
{
	public $timestamps = false;
	public $table = 'Study_university';
	public $fillable = ['study_id','faculty','chair'];
	public $hidden = ['study_id'];
	public function getStudy() {
		return $this->belongsToMany(Study::class,'Study_university','id','study_id');
	}
}
