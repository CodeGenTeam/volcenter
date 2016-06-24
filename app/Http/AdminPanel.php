<?php

namespace App\Http;

class AdminPanel {

    private $links = [
        [
            'id' => 'users',
            'name' => 'Пользователи',
            'link' => 'users',
        ],
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
            'id' => 'applications',
            'name' => 'Заявки',
            'link' => 'applications'
        ],
    ];

    public function getLinks() {
        return $this->links;
    }
}