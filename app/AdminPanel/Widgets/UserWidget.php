<?php

namespace App\AdminPanel\Widgets;

use App\AdminPanel\Widget;
use App\Models\User;

class UserWidget extends Widget {

    public function __construct() {
        parent::__construct('users', 'adminpanel.users');
    }

    public function getView() {
        return view('admin_panel.users.index', ['users' => User::all()]);
    }

    public function getDisplayName() {
        return 'Пользователи';
    }
}