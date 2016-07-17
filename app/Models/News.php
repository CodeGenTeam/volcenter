<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'content', 'created_by'];

    public function getCreator() {
        return $this->belongsTo(User::class, 'created_by');
    }
}