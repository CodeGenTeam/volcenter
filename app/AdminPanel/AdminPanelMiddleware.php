<?php

namespace App\AdminPanel;

use Closure;
use Pex;
use Auth;
use Illuminate\Http\Request;

class AdminPanelMiddleware {

    public function handle(Request $req, Closure $next) {
        if (env('APP_DEBUG')) return $next($req);
        $path = $req->decodedPath();
        if (!preg_match('/^adminpanel\/?.*/', $path)) return $next($req); // если это не админпанель

        if (!Auth::check()) return redirect('/');
        $permission = $this->genPermission($path);

        if (Pex::can($permission, true)) return redirect('/', 403, ['Msg' => 'Не, тебе сюда нелья!']);

        return $next($req);
    }

    private function genPermission($path) {
        $path = $path == 'adminpanel' ? 'index' : explode('/', $path)[1];
        return 'adminpanel.' . $path;
    }
}