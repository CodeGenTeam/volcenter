<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Event extends Model
{

    protected $table = "events_types";
    private $foreign = [
        'event_type' => 'events_types.id'
    ];

    public function __get($key)
    {
        if (!array_key_exists($key, $this->foreign)) {
            return $this->getAttribute($key);
        } else {
            $split = explode('.', $this->foreign[$key]);
            if (count($split) == 1) {
                return DB::table($split[0]);
            } elseif (count($split) == 2) {
                return Event_type::all()->where('id', parent::__get($key))->first();
            } else {
                return Event_type::all($split[2])->where('id', parent::__get($key))->first()->{$split[2]};
            }
        }
    }
}
