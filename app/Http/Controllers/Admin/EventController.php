<?php

namespace app\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/events/index');
    }
}
