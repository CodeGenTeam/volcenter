<?php
use app\AdminPanel\Widgets\EventsWidget;
use app\AdminPanel\Widgets\UsersWidget;

APanel::showOnIndexPage([
    'users' => [
        'id' => 'users',
        'name' => 'Пользователи',
        'link' => 'users',
    ],
]);

/*APanel::addWidget(new EventsWidget());
APanel::addWidget(new UsersWidget());*/