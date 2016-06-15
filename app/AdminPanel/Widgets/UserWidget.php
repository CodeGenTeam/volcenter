<?php

namespace app\AdminPanel\Widgets;

use app\AdminPanel\Widget;
use app\Models\Users;

class UsersWidget extends Widget {

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