<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class AdminPanelMiddleware {

    public function handle(Request $req, Closure $next) {
        //if (env('APP_DEBUG')) return $next($req);
        $path = $req->decodedPath();
        if (!preg_match('/^adminpanel\/?.*/', $path)) return $next($req); // если это не админпанель
        if (!Auth::check()) return redirect('/');
        $role = Auth::user()->role();
        if ($role!='admin' && $role!='moderator') return abort(403);
        return $next($req);
    }
}