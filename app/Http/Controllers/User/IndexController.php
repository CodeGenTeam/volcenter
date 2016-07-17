<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

    public function index(Request $req, $page = 1)
    {
        $number = 10;
        $date = Carbon::parse($req->all()['date'] ?? 'now');

        $news = News::where('created_at', '<=', $date)->orderBy('created_at', 'desc');
        return view('home', [
            'news' => $news->take($number)->skip($number * ($page - 1))->get(),
            'count' => $news->count(),
            'perPage' => $number,
            'page' => $page,
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function works()
    {
        return view('works');
    }
}
