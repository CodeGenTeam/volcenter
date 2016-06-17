<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Event;

class IndexController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 */
	public function __construct()
	{
		// только не зарегистрированных пропускает
		//$this->middleware('guest');
	}

    public function index()
    {
        return view('home');
    }
}
