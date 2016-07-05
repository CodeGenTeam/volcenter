<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['title', 'content', 'sender_id', 'receiver_id'];
    
    public function sender() {
        return $this->hasOne(User::class);
    }
}
