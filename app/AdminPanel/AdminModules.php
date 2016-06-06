<?php
use app\AdminPanel\Module;
use app\AdminPanel\Modules\EventsModule;
use app\AdminPanel\Modules\UsersModule;

APanel::showOnIndexPage(['events']);

APanel::addModule(new UsersModule());
APanel::addModule(new EventsModule());