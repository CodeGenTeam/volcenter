<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motivations_events extends Model
{
	protected $table = "Motivations_events";
	protected $fillable = ['motivation_id','event_id'];
	protected $hidden = ['id','motivation_id','event_id'];
	public $timestamps = false;
	public function getMotivation() {
		return $this->belongsToMany(Motivations::class,'Motivations_events','id','motivation_id');
	}
	public function getEvent() {
		return $this->belongsToMany(Events::class,'Motivations_events','id','event_id');
	}
}
