<?php

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    private $links = [
        [
            'id' => 'events',
            'name' => 'Мероприятия',
            'link' => 'events',
            'descr' => 'Редактирование и создание мероприятий, заявки пользователей.',
        ],
        [
            'id' => 'event_types',
            'name' => 'Типы мероприятия',
            'link' => 'event_types',
            'descr' => 'Создание или удаление типов мероприятий',
        ],
        [
            'id' => 'motivations',
            'name' => 'Мотивации',
            'link' => 'motivations',
            'descr' => 'Создание или удаление мотиваций для мероприятий',
        ],
        [
            'id' => 'responsibilities',
            'name' => 'Направления работ',
            'link' => 'responsibilities',
            'descr' => 'Создание или удаление направлений работ для мероприятий',
        ]
    ];

    public function getLinks()
    {
        return $this->links;
    }
}