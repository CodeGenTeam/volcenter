<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Event extends Model
{

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
                return DB::table($split[0])->where($split[1], parent::__get($key))->first();
            } else {
                return DB::table($split[0])->where($split[1], parent::__get($key))->select($split[2])->first()->{$split[2]};
            }
        }
    }
}
