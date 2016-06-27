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
    
    public function responsibility(Event $event, User $user)
    {
        // ответственности только по определенному мероприятию
        $responsibility_events_id = Responsibility_event::select('id')->where('event_id', $event->id)->get();
        // выбрали заявки по определенным направлениям, которым = id мероприятия, сгрупировали по пользователю и выбрали последний статус
        $applications = Application::whereIn('responsibility_event_id', $responsibility_events_id)->get()->where('user_id',$user->id)->last();
        return $applications;
    }
}