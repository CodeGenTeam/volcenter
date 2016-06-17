<?php
//use App\AdminPanel\Widgets\EventWidget;
//use App\AdminPanel\Widgets\UserWidget;

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

//APanel::addWidget(new EventWidget());
//APanel::addWidget(new UserWidget());