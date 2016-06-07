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
]);

/*APanel::addWidget(new EventsWidget());
APanel::addWidget(new UsersWidget());*/