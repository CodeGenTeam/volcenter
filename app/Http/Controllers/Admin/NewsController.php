<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show()
    {
        view('admin_panel.news.index', ['']);
    }

    public function page($page)
    {
        
    }

    public function create(Request $req)
    {

    }
}