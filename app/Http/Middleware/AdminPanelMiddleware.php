<?php

namespace App\Http\Middleware;

use Admin;
use Closure;
use Illuminate\Http\Request;

class AdminPanelMiddleware
{

    public function handle(Request $req, Closure $next)
    {
        if (!Admin::isModer() && !Admin::isAdmin()) return abort(403);
        return $next($req);
    }
}