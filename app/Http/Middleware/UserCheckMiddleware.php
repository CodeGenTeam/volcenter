<?php

namespace app\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use App\Models\User as MUser;

class UserCheckMiddleware {

    public function handle(Request $req, Closure $next) {
        $user = Auth::user();
        if (!env('APP_DEBUG') && $user && !MUser::where('id', $user->id)->count()) Auth::logout();
        return $next($req);
    }
}