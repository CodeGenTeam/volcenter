<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $timestamps = false;
    protected $hidden = ['id'];
    protected $fillable = ['lang_name'];
    public function getLanguageLevel()
    {
        return $this->hasMany(Language_level::class);
    }
}
