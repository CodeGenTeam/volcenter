<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsibilities_events extends Model
{
	protected $table = "Responsibilities_events";
	protected $fillable = ['event_id','responsibility_id'];
	protected $hidden = ['id','event_id','responsibility_id'];
	public $timestamps = false;
	public function getResponsibility() {
		return $this->belongsToMany(Responsibilities::class,'Responsibilities_events','id','responsibility_id');
	}
	public function getEvent() {
		return $this->belongsToMany(Events::class,'Responsibilities_events','id','event_id');
	}
}
