<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Profile_type;

class ProfileTypeController extends Controller
{
    public function index()
    {
        return Profile_type::all();
    }
}
