<?php

namespace app\AdminPanel\Modules;

use app\AdminPanel\Module;
use app\Models\Users;

class UsersModule extends Module {

    public function __construct() {
        parent::__construct('users', 'adminpanel.users');
    }

    public function getView() {
        return view('ap.users', ['users' => Users::all()]);
    }

    public function getDisplayName() {
        return 'Пользователи';
    }
}