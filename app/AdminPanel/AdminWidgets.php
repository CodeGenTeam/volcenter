<?php
use app\AdminPanel\Widgets\EventsWidget;
use app\AdminPanel\Widgets\UsersWidget;

APanel::links([
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
        'id' => 'motivations',
        'name' => 'Мотивации',
        'link' => 'motivations'
    ],
]);

/*APanel::addWidget(new EventsWidget());
APanel::addWidget(new UsersWidget());*/