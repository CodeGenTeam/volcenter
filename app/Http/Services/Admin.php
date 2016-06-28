<?php

namespace App\Http\Services;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Responsibility_event;
use App\Models\Application;
use App\Models\Responsibility;

class Admin extends Model {

    private $links = [
        [
            'id' => 'events',
            'name' => 'Мероприятия',
            'link' => 'events',
        ],
        [
            'id' => 'event_types',
            'name' => 'Типы мероприятия',
            'link' => 'event_types',
        ],
        [
            'id' => 'motivations',
            'name' => 'Мотивации',
            'link' => 'motivations'
        ],
        [
            'id' => 'responsibilities',
            'name' => 'Направления работ',
            'link' => 'responsibilities'
        ]
    ];

    public function getLinks() {
        return $this->links;
    }
}