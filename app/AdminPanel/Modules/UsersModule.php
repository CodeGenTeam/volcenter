<?php

namespace app\AdminPanel\Modules;

use app\AdminPanel\Module;
use app\Models\Users;

class UsersModule extends Module {

    public function __construct() {
        parent::__construct('users', 'adminpanel.users', function () {
            return view('ap.users', ['users' => Users::all()]);
        });
    }
}