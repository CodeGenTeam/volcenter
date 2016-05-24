<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
	public $timestamps = false;
	protected $table = 'Languages';
	protected $hidden = ['id'];
	protected $fillable = ['lang_name'];
    public function getLanguageLevel()
    {
        return $this->hasMany(Language_level::class, 'language_id', 'id');
    } 
}
