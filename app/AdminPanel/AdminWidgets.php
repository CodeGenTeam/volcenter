<?php
use app\AdminPanel\Widgets\EventsWidget;
use app\AdminPanel\Widgets\UsersWidget;

APanel::links([
    [
        'id' => 'users',
        'name' => 'Пользователи',
        'link' => 'users',
    ],
]);

/*APanel::addWidget(new EventsWidget());
APanel::addWidget(new UsersWidget());*/